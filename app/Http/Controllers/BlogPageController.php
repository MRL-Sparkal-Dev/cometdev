<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogPageController extends Controller
{
    /**
    *  Blog page show
    */
    public function showBlogPage()
    {
        $all_posts = Post::where( 'status', true ) -> where('trash', false) -> latest() -> paginate(4);
       return view('comet.blog', compact('all_posts') );

    }
}
