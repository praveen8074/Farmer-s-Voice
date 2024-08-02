<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\UserBlog;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function userBlogs()
    {
        $username = Auth::user()->name; 
        $posts = UserBlog::where('assigned_user', $username)->get();
        return view('user_blogs', compact('posts'));
    }
    public function exportPdf()
    {
        $username = Auth::user()->name; 
        $posts = UserBlog::where('assigned_user', $username)->get(); 
        $pdf = Pdf::loadView('user_blogs_pdf', compact('posts'));
        return $pdf->download('user_blogs.pdf');
    }
    public function about()
    {
        return view('about');
    }
}
