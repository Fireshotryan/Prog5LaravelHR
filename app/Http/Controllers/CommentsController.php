<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Games;
use App\Models\Comment;
use App\Models\GameVisit;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function show($id)
{
    $games = Games::find($id);
    $comments = $games->comments;

    if (auth()->user()->role == 0) {
        $user = auth()->user();

        // Check if the user has visited this game
        $gameVisit = GameVisit::where('user_id', $user->id)
            ->where('game_id', $games->id)
            ->first();

        if (!$gameVisit) {
            // User hasn't visited the game; create a visit record
            $gameVisit = new GameVisit();
            $gameVisit->user_id = $user->id;
            $gameVisit->game_id = $games->id;
            $gameVisit->visits = 1;
            $gameVisit->save();
        } else {
            // Increment the visit count
            $gameVisit->increment('visits');
        }

        // Check if the user has visited at least 5 games
        $visitedGameCount = GameVisit::where('user_id', $user->id)
            ->distinct('game_id')
            ->count();

        if ($visitedGameCount < 6) {
            return redirect()->route('dashboard')
                ->with('status', 'You need to view more games before posting comments.');
        }
    }

    return view('comments.show', compact('games', 'comments'));
}

    

    public function store(Request $request, $id)
{
    $games = Games::find($id);

    // Create a new comment and associate it with the game and user
    $comment = new Comment();
    $comment->content = $request->input('content');
    $comment->user_id = auth()->id(); 
    $comment->game_id = $games->id;
    $games->comments()->save($comment);

    return redirect()->route('comments.show', ['games' => $games->id])->with('status', 'Comment added');
}
}
