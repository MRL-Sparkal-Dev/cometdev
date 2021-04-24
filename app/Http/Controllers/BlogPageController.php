<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
    /**
     *  Blog search by search box
     */
    public function blogSearch(Request $request){
        if ( empty( $request -> search ) ){
            $search ='';
        }else{
            $search = $request -> search;
        }
        $posts = Post::where( 'title', 'LIKE', '%'. $search .'%' ) -> orWhere( 'created_at', 'LIKE', '%'. $search .'%' ) -> latest() -> paginate();
        return view('comet.blog-search',[
            'all_posts' => $posts,
        ]);
    }
    /**
     *  Blog Search by Category
     */
    public function blogSearchByCat($slug){
        $cats = Category::where( 'slug', $slug ) -> latest() -> first();

        return view('comet.category-blog',[
            'all_posts' => $cats -> posts,
        ]);

    }

    /**
     *  Show single blog post
     */
    public function blogSingle( $slug ){

       $single_post =  Post::where( 'slug', $slug ) -> first();
        $this -> viewCount( $single_post -> id );
        return view('comet.blog-single', compact('single_post'));
    }

    /**
     *  Post views Count
     */
    private function viewCount( $post_id ){
        
    //    $post_id = $single_post -> id;
       $post_view_count = Post::find($post_id);
       $old_views = $post_view_count -> views;
       $post_view_count -> views = $old_views + 1 ;
       $post_view_count -> update() ;
    }


}
