<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts=Post::where('user_id', auth()->user()->id)->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newPost = new Post;
        $newPost->user_id = auth()->id();
        $newPost->author = $data['author'];
        $newPost->title = $data['title'];
        $newPost->post_content = $data['post_content'];
        $newPost->post_image = Storage::put('images', $data['post_image']);
        $newPost->post_date = $data['post_date'];
            
        $newPost->save();

        return redirect()->route('admin.posts.show', $newPost->id)->with('created', $data['author']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $Post)
    {
        return view('admin.posts.show', compact('Post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $Post)
    {
        return view('admin.posts.edit', compact('Post'));
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
        $data = $request->all();
        $post=Post::findOrFail($id);

        $post->author = $data['author'];
        $post->title = $data['title'];
        $post->post_content = $data['post_content'];
        $post->post_image = $data['post_image'];
        $post->post_date = $data['post_date'];
            
        $post->save();

        return redirect()->route('admin.posts.show', $post->id)->with('edited', $post->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findorfail($id);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('delete', $post->author);
    }
}
