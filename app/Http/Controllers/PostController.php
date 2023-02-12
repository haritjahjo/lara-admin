<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $published = 0;
        if($request->has('is_published')){
            $published = 1;
        }
        
        $validatedData = $request->validated();
        $validatedData['image'] = $request->file('image')->store('posts');
        Post::create($validatedData + [
            'is_published' => $published,
        ]);
        

        return to_route('posts.index')->with('status', 'Post is added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        

        $published = 0;
        if($request->has('is_published')){
            $published = 1;
        }
        if($request->hasFile('image')){
            Storage::delete($post->image);
            $post->image = $request->file('image')->store('posts');
        }

        $post->update($request->validated() + [
            'is_published' => $published,   
            'image' => $post->image,
        ]);
        
        //$story->tags()->sync($request->tags);
        //dd($story);
        return to_route('posts.index')->with('status', 'Post is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::delete($post->image);

        $post->delete();

        return back()->with('status', 'Post is deleted successfully');
    }
}
