<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Subscriber;
use Illuminate\Support\Str;
// use AmrShawky\Currency\Facade\Currency;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Carbon\Exceptions\Exception;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use App\Notifications\OrderPlaceNotification;
use App\Notifications\SubscribedNotification;


class CommonController extends Controller
{

    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'User Logout Successfully');
    }
    public function FrontendPortfolio()
    {
        $portfolio = Portfolio::latest()->get();
        return view('frontend.portfolio.portfolio', compact('portfolio'));
    }
    public function FrontendService()
    {
        $services = Service::all();
        return view('frontend.service.service', compact('services'));
    }
    public function FrontendSingleService($id, $uniqueId = null)
    {
        $service = Service::where('id', $id)->first();
        // dd($service);
        return view('frontend.service.single-service', compact('service', 'uniqueId'));
    }
    public function FrontendContact()
    {
        return view('frontend.contact.contact');
    }
    public function ContactMessage(Request $request)
    {
        $validated = $request->validate([
            'fullName'       => 'required',
            'email'      => 'required',
            'phone'      => 'min:11 | required',
            'enquiryType'    => 'required',
            'message'    => 'required',
        ]);
        Contact::insert([
            'fullName'          => $request->fullName,
            'email'         => $request->email,
            'phone'         => $request->countryCode . " " . $request->phone,
            'companyname'   => $request->companyName,
            'countryName' => $request->countryName,
            'enquiryType'       => $request->enquiryType,
            'fromWhereHeard'       => $request->fromWhereHeard,
            'message'       => $request->message,
            'created_at'    => Carbon::now()
        ]);
        // return p($request->all());

        session()->flash(
            "alert",
            "Message sent successfully"
        );
        return redirect()->route('frontend.contact');
    }
    public function FrontendBlog()
    {
        $allBlogs = DB::table('blogs')->latest()->paginate('12');
        $featureBlogs = DB::table('blogs')->where('type', 'Feature')->latest()->paginate('6');
        $popularBlogs = DB::table('blogs')->orderBy('visits', 'desc')->take(4)->get();
        $categories = BlogCategory::with('getBlogs')->get();
        return view('frontend.blog.blog', compact('featureBlogs', 'allBlogs', 'popularBlogs', 'categories'));
    }
    public function WatchFrontendBlog($title)
    {
        $categories = BlogCategory::with('getBlogs')->get();
        $popularBlogs = DB::table('blogs')->orderBy('visits', 'desc')->take(4)->get();
        if ($title != null) {
            $blog = DB::table('blogs')->where('title', $title)->first();
            if ($blog != null) {
                DB::table('blogs')
                    ->where('title', $title)->update(['visits' => $blog->visits + 1]);
                $popularBlogs = DB::table('blogs')->orderBy('visits', 'desc')->take(4)->get();
                return view('frontend.blog.singleBlog', compact('blog', 'categories', 'popularBlogs'));
            } else {
                abort('404');
            }
        }
    }
    public function searchBlog(Request $request)
    {
        $query = $request['query'];
        $searchedBlog = DB::table('blogs')->where('title', 'LIKE', "%$query%")->latest()->paginate('12');
        $categories = BlogCategory::with('getBlogs')->get();
        $popularBlogs = DB::table('blogs')->orderBy('visits', 'desc')->take(4)->get();
        $data = compact('query', 'categories', 'popularBlogs', 'searchedBlog');
        return view('frontend.blog.searchBlog')->with($data);
    }
    public function FrontendAffiliate()
    {
        return view('frontend.affiliate.affiliate');
    }
    public function StoreAffiliated(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'phone' => 'required|unique:users|max:255',
            'whatsapp' => 'required|unique:users|max:255',
            'password' => 'required|confirmed|min:6',
            'paymentMethod' => 'required',
            'cardNumber' => 'required|unique:users|max:255',
        ]);
        $uniqueId = Str::uuid()->toString();
        $affiliated =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'whatsapp' => $request->whatsapp,
            'password' => Hash::make($request->password),
            'paymentMethod' => $request->paymentMethod,
            'cardNumber' => $request->cardNumber,
            'uniqueId' =>  $uniqueId,
            'created_at'    => Carbon::now()
        ]);
        // return $affiliated;
        if ($affiliated != null) {
            $affiliated->syncRoles('affiliated');
        }
        return redirect()->back();
    }
    public function FrontendAboutsds()
    {
        return view('frontend.about.aboutSDS.aboutsds');
    }
    public function FrontendTeam()
    {
        return view('frontend.about.team.team');
    }
    public function FrontendTechnologies()
    {
        return view('frontend.technologies.technologies');
    }
    public function subscriber(Request $request)
    {
        $validated = $request->validate([
            'subscriberEmail' => 'required|max:50|email',
        ]);
        $subscriber = new Subscriber();
        $subscriber->email = $request->subscriberEmail;
        $subscriber->save();
        $subscriber->notify(new SubscribedNotification);
        return redirect()->route('/');
    }

    // orders functions
    public function getInfo(Request $request)
    {
        if (!session()->has('message')) {
            $data = $request->only(['service_id', 'quality', 'promoCode', 'type']);
            return view('frontend.service.order.getInfo', ['data' => $data]);
        } else {
            // redirecting after getting information
            return redirect()->route('frontend.service');
        }
    }
    public function placeOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullName' => 'required',
            'email' => 'required',
            'phone' => 'min:10 | required',
            'reason' => 'required | min:20',
            'description' => 'required | min:20',
            'serviceId' => 'required',
            'quality' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'data' => $validator->messages()
            ], 200);
        } else {
            // setting flash session to redirect after placing order .Related to getinfo function
            session()->flash('message', "placed");
            $type = $request->type == 'demo' ? "demo" :  "real";
            $order = Order::create([
                'name' => $request->fullName,
                'email' => $request->email,
                'phone' => $request->countryCode . " " . $request->phone,
                'company' => $request->companyName,
                'country' => $request->countryName,
                'companySize' => $request->companySize,
                'reason' => $request->reason,
                'description' => $request->description,
                'service_type' => $type,
                'quality' => $request->quality,
                'service_id' => $request->serviceId,
                'affiliate_id' => $request->promoCode
            ]);
            $order->notify(new OrderPlaceNotification);
            return response()->json([
                'status' => 1,
                'data' => "Your order has been placed successfully. Our employee will contact you soon thorough your phone number."
            ], 200);
        }
    }
}
