<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostComment;

class PostController extends Controller
{
     public function index() {
        $posts = Post::with('user', 'comments.user')->latest()->get();
        return view('posts.index', compact('posts'));
    }

      public function store(Request $request) {
        $request->validate(['description' => 'required']);

        Post::create([
            'user_id' => auth()->id(),
            'name' => auth()->user()->name,
            'description' => $request->description,
        ]);

        return back();
    }

    public function comment(Request $request, $postId) {
        $request->validate(['comment' => 'required']);

        PostComment::create([
            'post_id' => $postId,
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);

        return back();
    }

}
