<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Testimonial;
use App\Models\Blog;

class HomeController extends Controller
{
    public function home()
    {
        $campaigns = Campaign::where(['status' => 1, 'is_featured' => 1])->latest()->take(6)->get();

        $testimonials = Testimonial::where('status', 1)->latest()->get();
        $blogs = Blog::where('status', 1)->latest()->take(3)->get();

        return view('welcome', compact('campaigns', 'testimonials', 'blogs'));
    }
}
