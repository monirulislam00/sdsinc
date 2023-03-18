<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:view blogs'])->only(['Blog']);
        $this->middleware(['permission:create blogs'])->only(['StoreBlog']);
        $this->middleware(['permission:edit blogs'])->only(['Update']);
        $this->middleware(['permission:delete blogs'])->only(['Delete']);
    }
    public function Blog()
    {
        $blogs = Blog::latest()->with('getCategory')->get();
        $blog_categories = DB::table('blog_categories')->latest()->get();
        return view('admin.blog.index', compact('blogs', 'blog_categories'));
    }
    public function StoreBlog(Request $request)
    {
        $validated = $request->validate([
            'title'     => 'required|min:5',
            'type'      => 'required',
            'blog_cat'      => 'required',
            'description' => 'required|min:10',
            'image'     => 'required|mimes:jpg,jpeg,png'
        ]);
        $image = $request->file('image');

        $name_gen = str_replace(" ", "_", $image->getClientOriginalName());
        echo $name_gen;
        // die;
        Image::make($image)->resize(750, 492)->save('image/blogs/' . $name_gen);

        $last_img = 'image/blogs/' . $name_gen;

        Blog::insert([
            'title'     => $request->title,
            'cat_id'    => $request->blog_cat,
            'type'      => $request->type,
            'description' => $request->description,
            'image'     => $last_img,
            'created_at' => Carbon::now()
        ]);
        return redirect()->back()->with('success', 'Blog insert successfully');
    }
    public function Edit($id)
    {
        $blog = Blog::where('id', $id)->with('getCategory')->first();
        $blog_categories = DB::table('blog_categories')->latest()->get();
        return view('admin.blog.edit', compact('blog', 'blog_categories'));
    }
    public function Update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'     => 'required|min:5',
            'type'      => 'required',
            'blog_cat'      => 'required',
            'description' => 'required|min:10',
            'image'     => 'mimes:jpg,jpeg,png'
        ]);
        $old_image = $request->old_image;
        $image     = $request->image;

        if ($image) {
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(750, 400)->save('image/blogs/' . $name_gen);

            $last_img = 'image/blogs/' . $name_gen;
            unlink($old_image);

            Blog::find($id)->update([
                'title'     => $request->title,
                'type'      => $request->type,
                'cat_id'    => $request->blog_cat,
                'description' => $request->description,
                'image'     => $last_img,
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('blog')->with('success', 'Blog Updated successfully');
        } else {
            Blog::find($id)->update([
                'title'     => $request->title,
                'type'      => $request->type,
                'cat_id'    => $request->blog_cat,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('blog')->with('success', 'Blog Updated successfully');
        }
    }
    public function Delete($id)
    {
        $image = Blog::find($id);
        $old_image = $image->image;
        unlink($old_image);
        Blog::find($id)->delete();
        return redirect()->back()->with('success', 'Blog Deleted successfully');
    }
}
