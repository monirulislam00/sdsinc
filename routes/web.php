<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Service;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\ChangePass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HrController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\WebdevController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\NetworkController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AffiliatedController;
use App\Http\Controllers\Bio_metricController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\SubscribersController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\AffiliateEarningController;
use App\Http\Controllers\AffiliateProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $products = Product::latest()->with('getService')->take(6)->get();
    $services = Service::latest()->take(6)->get();
    $features = DB::table('features')->get();
    $portfolio = DB::table('portfolios')->latest()->get();
    $partner = DB::table('partners')->latest()->get();
    $popularBlogs = DB::table('blogs')->orderBy('visits', 'desc')->take(3)->get();
    $blogs = DB::table('blogs')->latest()->take(6)->get();
    return view('frontend.index', compact('features', 'portfolio', 'partner', 'popularBlogs', 'products', 'blogs', 'services'));
})->name('/');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $loggedInUser = auth::user();
        // return $loggedInUser;
        $user = User::find($loggedInUser->id);

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $transactions = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])->get();
        $monthlyEarnings = $transactions->sum('earnings');


        if ($user->status == 0) {
            $user->logout();
        }
        if ($user->hasexactroles('affiliated')) {
            return redirect()->route('affiliate.index');
        } else {
            $totalAmount = DB::table('orders')->sum('earnings');
            return view('admin.index', compact('totalAmount', 'monthlyEarnings'));
        }
    })->name('dashboard');
});
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/profile/show', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('profile.show');
/* -------------------------------------------------------------------------- */
/*                               All Admin Route                              */
/* -------------------------------------------------------------------------- */

Route::get('/user/logout', [CommonController::class, 'Logout'])->name('user.logout');
Route::prefix('dashboard')->group(
    function () {
        // slider route
        Route::get('/slider', [SliderController::class, 'SliderView'])->name('slider');
        Route::post('/Store/slider', [SliderController::class, 'StoreSlider'])->name('store.slider');
        Route::get('slider/edit/{id}', [SliderController::class, 'Edit']);
        Route::post('slider/update/{id}', [SliderController::class, 'Update']);
        Route::get('slider/delete/{id}', [SliderController::class, 'Delete']);

        // Feature route
        Route::get('/feature', [FeatureController::class, 'FeatureView'])->name('feature');
        Route::post('/Store/feature', [FeatureController::class, 'StoreFeature'])->name('store.feature');
        Route::get('feature/edit/{id}', [FeatureController::class, 'Edit']);
        Route::post('feature/update/{id}', [FeatureController::class, 'Update']);
        Route::get('feature/delete/{id}', [FeatureController::class, 'Delete']);

        // Portfolio Route
        Route::get('/portfolio/view', [PortfolioController::class, 'Portfolio'])->name('portfolio');
        Route::post('/Store/portfolio', [PortfolioController::class, 'StorePortfolio'])->name('store.portfolio');
        Route::get('portfolio/edit/{id}', [PortfolioController::class, 'Edit']);
        Route::post('portfolio/update/{id}', [PortfolioController::class, 'Update']);
        Route::get('portfolio/delete/{id}', [PortfolioController::class, 'Delete']);

        // Partner Route
        Route::get('/partner', [PartnerController::class, 'Partner'])->name('partner');
        Route::post('/Store/partner', [PartnerController::class, 'StorePartner'])->name('store.partner');
        Route::get('partner/edit/{id}', [PartnerController::class, 'Edit']);
        Route::post('partner/update/{id}', [PartnerController::class, 'Update']);
        Route::get('partner/delete/{id}', [PartnerController::class, 'Delete']);

        // Service Route
        Route::resource('/service', ServiceController::class);
        /* ----------------------------- Product Routes ----------------------------- */

        Route::resource('/product_types', ProductTypeController::class);
        Route::resource('products', ProductController::class)->middleware('auth');

        // Contact Route
        Route::get('contact/message/view', [ContactController::class, 'Contact'])->name('contact');
        Route::get('contact/delete/{id}', [ContactController::class, 'Delete']);

        // Blog Route
        Route::get('/blog/view', [BlogController::class, 'Blog'])->name('blog');
        Route::post('/Store/blog', [BlogController::class, 'StoreBlog'])->name('store.blog');
        Route::get('blog/edit/{id}', [BlogController::class, 'Edit']);
        Route::post('blog/update/{id}', [BlogController::class, 'Update']);
        Route::get('blog/delete/{id}', [BlogController::class, 'Delete']);

        /* --------------------------- BlogCategory routes -------------------------- */
        Route::post('blog/category', [BlogCategoryController::class, 'createCategory'])->name('blogCategory.store');

        // About team Route =====Board of Director
        Route::get('director/team/view', [TeamController::class, 'Team'])->name('about.team');
        Route::get('add/director/team', [TeamController::class, 'AddTeam'])->name('addteam');
        Route::post('store/director/team', [TeamController::class, 'StoreTeam'])->name('store.team');
        Route::get('team/edit/{id}', [TeamController::class, 'Edit']);
        Route::post('team/update/{id}', [TeamController::class, 'Update']);
        Route::get('team/delete/{id}', [TeamController::class, 'Delete']);

        // Management Route
        Route::get('management/team/view', [ManagementController::class, 'Management'])->name('about.management');
        Route::get('add/management', [ManagementController::class, 'AddManagement'])->name('addmanagement');
        Route::post('Store/management', [ManagementController::class, 'StoreManagement'])->name('store.management');
        Route::get('mmt/edit/{id}', [ManagementController::class, 'Edit']);
        Route::post('mmt/update/{id}', [ManagementController::class, 'Update']);
        Route::get('mmt/delete/{id}', [ManagementController::class, 'Delete']);

        // HR Route
        Route::get('hr/team/view', [HrController::class, 'HR'])->name('about.HR');
        Route::get('add/hr', [HrController::class, 'AddHR'])->name('addhr');
        Route::post('store/hr', [HrController::class, 'StoreHR'])->name('store.hr');
        Route::get('hr/edit/{id}', [HrController::class, 'Edit']);
        Route::post('hr/update/{id}', [HrController::class, 'Update']);
        Route::get('hr/delete/{id}', [HrController::class, 'Delete']);

        // Account Route
        Route::get('account/team/view', [AccountController::class, 'Account'])->name('about.account');
        Route::get('add/account', [AccountController::class, 'AddAccount'])->name('addaccount');
        Route::post('Store/hr', [AccountController::class, 'StoreAccount'])->name('store.account');
        Route::get('acc/edit/{id}', [AccountController::class, 'Edit'])->name('account.edit');
        Route::post('acc/update/{id}', [AccountController::class, 'Update']);
        Route::get('acc/delete/{id}', [AccountController::class, 'Delete']);

        // Bio Metric Route
        Route::get('bio_metric/team/view', [Bio_metricController::class, 'Bio_Metric'])->name('about.biometric');
        Route::get('add/bio_metric', [Bio_metricController::class, 'AddBio'])->name('addbiometric');
        Route::post('Store/bio_metric', [Bio_metricController::class, 'StoreBio'])->name('store.biometric');
        Route::get('bio/edit/{id}', [Bio_metricController::class, 'Edit']);
        Route::post('bio/update/{id}', [Bio_metricController::class, 'Update']);
        Route::get('bio/delete/{id}', [Bio_metricController::class, 'Delete']);

        // WebDev Route
        Route::get('webdev/team/view', [WebdevController::class, 'Dev'])->name('about.webdev');
        Route::get('add/webdev', [WebdevController::class, 'AddDev'])->name('addwebdev');
        Route::post('Store/webdev', [WebdevController::class, 'StoreDev'])->name('store.webdev');
        Route::get('dev/edit/{id}', [WebdevController::class, 'Edit']);
        Route::post('dev/update/{id}', [WebdevController::class, 'Update']);
        Route::get('dev/delete/{id}', [WebdevController::class, 'Delete']);

        // Network Route
        Route::get('network/team/view', [NetworkController::class, 'Net'])->name('about.network');
        Route::get('add/network/team', [NetworkController::class, 'AddNet'])->name('addnetwork');
        Route::post('store/webdev/team', [NetworkController::class, 'StoreNet'])->name('store.network');
        Route::get('net/edit/{id}', [NetworkController::class, 'Edit']);
        Route::post('net/update/{id}', [NetworkController::class, 'Update']);
        Route::get('net/delete/{id}', [NetworkController::class, 'Delete']);

        // E-commerce Route
        Route::get('e-commerce/team/view', [EcommerceController::class, 'Ecom'])->name('about.ecom');
        Route::get('add/e_commerce/team', [EcommerceController::class, 'AddEcom'])->name('addecommerce');
        Route::post('store/e_commerce/team', [EcommerceController::class, 'StoreEcom'])->name('store.ecommerce');
        Route::get('ecom/edit/{id}', [EcommerceController::class, 'Edit']);
        Route::post('ecom/update/{id}', [EcommerceController::class, 'Update']);
        Route::get('ecom/delete/{id}', [EcommerceController::class, 'Delete']);



        Route::middleware('auth')->group(function () {
            // ============ Change password & User profile========================//
            Route::get('change_password', [ChangePass::class, 'CPassword'])->name('change.password');
            Route::post('update_password', [ChangePass::class, 'UpdatePassword'])->name('update.password');
            Route::get('user/profile', [ChangePass::class, 'PUpdate'])->name('profile.update');
            Route::post('user/profile/update', [ChangePass::class, 'UpdateProfile'])->name('update.user.profile');


            // =========================== Subscribers  ======================== //

            Route::get('subscribers', [SubscribersController::class, 'index'])->name('subscribers.index');
            Route::get('subscribers/delete/{id}', [SubscribersController::class, 'delete'])->name('dashboard.subscribers.delete');

            Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
            Route::get('orders/accept/{id}', [OrderController::class, 'OrderAccept']);
            Route::get('orders/cancel/{id}', [OrderController::class, 'OrderCancel']);
            Route::get('orders/delete/{id}', [OrderController::class, 'OrderDelete']);


            // ============ Users and affiliates ========= //
            // Route::prefix('dashboard')->group(function () {

            Route::resource('/users', UserController::class);
            Route::get('/affiliates', [UserController::class, 'affiliates'])->name('user.affiliates');
            //==========================role  routes ============================//
            Route::resource('/roles', RoleController::class);
        });
        //========================== Routes for affiliated ==================//

    }
);

/* -------------------------------------------------------------------------- */
/*                             End All Admin Route                            */
/* -------------------------------------------------------------------------- */



/* -------------------------------------------------------------------------- */
/*                             Start All affiliated Route                     */
/* -------------------------------------------------------------------------- */
Route::prefix('affiliated/')->group(function () {
    Route::get('/dashboard', [AffiliatedController::class, "index"])->name('affiliate.index');
    Route::get('/services', [AffiliatedController::class, "services"])->name('affiliate.services');

    //==========================orders through link ==================================/
    Route::get('earnings', [AffiliateEarningController::class, 'getEarnings'])->name('earnings.affiliated');
    Route::get('/profile', [AffiliateProfileController::class, 'profile'])->name('affiliate.profile');
    Route::post('/profile/update/', [AffiliateProfileController::class, 'UpdateProfile'])->name('affiliate.profileUpdate');
});

/* -------------------------------------------------------------------------- */
/*                             End All affiliated Route                            */
/* -------------------------------------------------------------------------- */



/* -------------------------------------------------------------------------- */
/*                               FrontEnd Route start                         */
/* -------------------------------------------------------------------------- */

//================================= portfolio routes ========================/

Route::get('portfolio', [CommonController::class, 'FrontendPortfolio'])->name('frontend.portfolio');


//================================= service routes ========================/

Route::get('service', [CommonController::class, 'FrontendService'])->name('frontend.service');
Route::get('service/{serviceName}/', [CommonController::class, 'FrontendSingleService']);
Route::get('products/{productId}/{userId?}', [CommonController::class, 'FrontendSingleProduct']);

Route::post('product/order', [CommonController::class, 'getInfo'])->name('order.info');
Route::post('product/placeOrder', [CommonController::class, 'placeOrder'])->name('order.place');
//================================= contact routes ========================/

Route::get('contact', [CommonController::class, 'FrontendContact'])->name('frontend.contact');
Route::post('contact/message', [CommonController::class, 'ContactMessage'])->name('contactmessage');

//================================= blogs routes ========================/

Route::get('blogs', [CommonController::class, 'FrontendBlog'])->name('frontend.blogs');
Route::get('blog/{title}', [CommonController::class, 'WatchFrontendBlog']);
Route::post('blogs/', [CommonController::class, 'searchBlog']);

//================================= affiliate routes ========================/

Route::get('affiliate', [CommonController::class, 'FrontendAffiliate'])->name('frontend.affiliate');
Route::post('store/affiliate', [CommonController::class, 'StoreAffiliated'])->name('store.affiliated');
//================================= About_of_SDSINC routes ========================/

Route::get('About_of_SDSINC.', [CommonController::class, 'FrontendAboutsds'])->name('frontend.aboutsds');
//================================= our_team routes ========================/


Route::get('our_team', [CommonController::class, 'FrontendTeam'])->name('frontend.team');

//================================= global routes ========================/

// Route::get("global", [CommonController::class, 'FrontendGlobal'])->name('frontend.global');

//================================= technologies routes ========================/

Route::get("technologies", [CommonController::class, 'FrontendTechnologies'])->name('frontend.tech');

//================================= subscribe routes ========================/

Route::post('subscribe', [CommonController::class, 'subscriber'])->name('subscribe');



/* -------------------------------------------------------------------------- */
/*                               FrontEnd Route ends                          */
/* -------------------------------------------------------------------------- */
