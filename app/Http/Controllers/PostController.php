<?php

namespace App\Http\Controllers;

use App\DTOs\PostDTO;
use App\Models\Post;
use App\Services\PostServices;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Post::class); 
        $posts = Post::get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dto = new PostDTO($request->title, $request->content, $request->is_published);
        PostServices::createPost($dto);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('view', $post);
        return $post;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    public function like(Post $post){
        $lock = Cache::lock('post_'.$post->id,10);
        if($lock->get()){
            $post->increment('likes');
            sleep(3);
            $lock->release();
        }
        return $post->fresh();
    }

    public function dislike(Post $post){
        Cache::lock('post-'.$post->id, 10)->block(5, function() use ($post){
            $post->decrement('dislikes');
        });
        return $post;
    }
    
}
