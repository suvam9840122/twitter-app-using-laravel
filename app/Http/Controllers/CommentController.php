<?php

namespace App\Http\Controllers;
use App\Models\Idea;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  public function store(Request $request, Idea $idea)
{
    $request->validate([
        'content' => 'required|string|max:255',
    ]);

    Comment::create([
        'idea_id' => $idea->id,
        'content' => $request->content,
    ]);

    return redirect()->back();
}
}