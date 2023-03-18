<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function createCategory(Request $request)
    {
        $validated = $request->validate([
            'category_name'     => 'required',
        ]);
        $blogCategory = new BlogCategory();
        $blogCategory->category_names = $request->category_name;
        $blogCategory->save();
        return redirect()->back()->with('success', 'New category created successfully');
    }
}
