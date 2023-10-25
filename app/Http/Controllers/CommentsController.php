<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Games;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function show($id)
    {
        $games = Games::find($id);
        $comments = $games->comments; 

        if (auth()->user()->role == 0 || auth()->user()->role == 1 || auth()->user()->role == 2) {
            return view('comments.show', compact('games', 'comments'));
        }
        else {
            return view('home', compact('games'));
        }
    }

    public function store(Request $request, $id)
{
    $games = Games::find($id);

    // Create a new comment and associate it with the game and user
    $comment = new Comment();
    $comment->content = $request->input('content');
    $comment->user_id = auth()->id(); // Assuming you have user authentication
    $comment->game_id = $games->id;
    $games->comments()->save($comment);

    return redirect()->route('comments.show', ['games' => $games->id])->with('status', 'Comment added');
}
}
