<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Blog;
use App\Models\Client;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductPrimaryCategory;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blog_count         =     Blog::count();
        $user_count         =     User::count();
        $primary_count      =     ProductPrimaryCategory::count();
        $product_count      =     Product::count();
        $latestPosts        =     Blog::orderBy('created_at', 'DESC')->take(4)->get();
        $latestProduct      =     Product::orderBy('created_at', 'DESC')->take(4)->get();
        $latestUsers        =     User::orderBy('created_at', 'DESC')->take(4)->get();
        $latestcategory     =     ProductPrimaryCategory::with('secondary','products')->orderBy('created_at', 'DESC')->take(4)->get();


        return view('backend.dashboard',compact('latestUsers','latestProduct','blog_count','user_count','primary_count','product_count','latestPosts','latestcategory'));    }
}
