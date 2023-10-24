<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Games;
use Illuminate\Http\Request;
use App\Http\Requests\GamesStoreRequest;
use App\Http\Requests\GamesUpdateRequest;

class GamesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $games = Games::all();

        if (auth()->user()->role == 1 || auth()->user()->role == 2) {
            return view('admin.games.index', compact('games'));
        }
        else {
            return view('home', compact('games'));
        }
    }

    public function create()
    {
        $games = Games::all(); /* dit voorkomt een error */

        if (auth()->user()->role == 1 || auth()->user()->role == 2) {
           return view('admin.games.create');
        }
        else {
            return view('home', compact('games'));
        }
    }

    public function store(GamesStoreRequest $request)
    {
        $games = new Games();
        $games -> name = $request->name;
        $games -> description = $request->description;
        $games->user_id = auth()->id();

            // Handle image upload
    if ($request->hasFile('game_img')) {
        $image = $request->file('game_img');
        $imageName = time().'.'.$image->extension();
        $image->storeAs('public/games', $imageName);
        $games->game_img = 'games/' . $imageName;
    }

        $games -> save();
        return redirect()->route('games.index')->with('status', 'game created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Games  $games
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $games = Games::find($id);

        if (auth()->user()->role == 0 || auth()->user()->role == 1 || auth()->user()->role == 2) {
            return view('admin.games.show', compact('games'));
        }
        else {
            return view('home', compact('games'));
        }
    }

      /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Games  $games
     * @return \Illuminate\Http\Response
     */

    public function edit(Games $games, $id)
    {
        $games = Games::find($id);

        if (auth()->user()->role == 1 || auth()->user()->role == 2) {
            return view('admin.games.edit', compact('games'));
        }
        else {
            return view('home', compact('games'));
        }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Games  $games
     * @return \Illuminate\Http\Response
     */
    public function update(GamesUpdateRequest $request, $id)
    {
        $games = Games::find($id);
        $games->name = $request->name;
        $games->description = $request->description;

      // Check if a new image has been uploaded
      if ($request->hasFile('game_img')) {
        // Remove the old image (if it exists)
        if ($games->game_img) {
            // Delete the old image file
            Storage::delete('public/' . $games->game_img);
        }

        // Upload and store the new image
        $image = $request->file('game_img');
        $imageName = time() . '.' . $image->extension();
        $image->storeAs('public/games', $imageName);
        $games->game_img = 'games/' . $imageName;
    }

        $games->save();
        return redirect()->route('games.index')->with('status', 'Game Updated');

    }

    public function accept($id)
    {
        $game = Games::find($id);
        $game->game_status = true; // Change the status to "true"
        $game->save();
    
        return redirect()->route('games.index')->with('status', 'Game accepted');
    }
    
    public function reject($id)
    {
        $game = Games::find($id);
        $game->game_status = false; // Change the status back to "false"
        $game->save();
    
        return redirect()->route('games.index')->with('status', 'Game rejected');
    }

     /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\Models\Games  $games
     * @return \Illuminate\Http\Response
     */
    public function delete(Games $games)
    {

        if (auth()->user()->role == 1 || auth()->user()->role == 2) {
            return view('admin.games.delete', compact('games'));
        }
        else {
            return view('home', compact('games'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Games  $games
     * @return \Illuminate\Http\Response
     */
    public function destroy(Games $games, $id)
    {
        $games = Games::find($id);
        $games->delete();
        return redirect()->route('games.index')->with('status', 'Game deleted');
    }
}
