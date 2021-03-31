<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::all();

        return view('admin.post.index',[
            'all_data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat =  Category::all();
        $tag = Tag::all();
        // return view
        return view('admin.post.create', [
            'all_cat' => $cat,
            'all_tag'  => $tag,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this -> validate($request,[
            'title'     => 'required',
            'content'   => 'required'
        ]);

        $unique_file_name = '';

        if( $request -> hasFile('image') ){
            $img = $request -> file('image');
            $unique_file_name = md5(time().rand()).'.'.$img -> getClientOriginalExtension();
            $img -> move(public_path('media/post/'), $unique_file_name );
        }

        $gallery_images = [];

        if( $request -> hasFile('post_gallery') ){

            foreach( $request -> file('post_gallery') as $post_gallery ) {
               $unique_gallery_name = md5(time().rand()).'.'. $post_gallery -> getClientOriginalExtension();
               $post_gallery -> move(public_path('media/post/'), $unique_gallery_name );
               array_push( $gallery_images, $unique_gallery_name );

            }

        }

         $post_featured =[
            'post_type'    => $request -> post_type,
            'image'        => $unique_file_name,
            'post_gallery' => $gallery_images,
            'post_vedio'   => $request -> video,
            'post_audio'   => $request -> audio
        ];

        Post::create([
            'title'     => $request -> title,
            'slug'      => Str::slug( $request -> title ),
            'featured'   => json_encode( $post_featured ),
            'content'   => $request -> content
        ]);

        return redirect() -> route('post.index') -> with('success', 'Post Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
