<?php
namespace App\Services;
use App\DTOs\PostDTO;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostServices{
    public static function createPost(PostDTO $postDTO){
        Post::create([
            'title' => $postDTO->title,
            'content' => $postDTO->content,
            'is_published' => $postDTO->is_published,
        ]);
        tap(User::find(Auth::id()), function($user){
            $user->update([
                'name' => strtolower($user->name)
            ]);
            $user->fresh();
        });
    }
}