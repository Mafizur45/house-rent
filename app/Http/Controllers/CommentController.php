<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'comment' => 'required'
    ]);

    Comment::create([
        'house_id' => $id,
        'name' => $request->name,
        'comment' => $request->comment
    ]);

    return back()->with('success', 'Comment added successfully!');
}
}
