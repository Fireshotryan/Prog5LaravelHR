<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Games;
use Illuminate\Http\Request;


class GamesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $games = Games::all();

        return view('admin.games.index', compact('games'));
    }

    public function create()
    {
        return view('admin.games.create');
    }
    
    public function store(GamesStoreRequest $request)
    {
        $games = new Games();
        $games -> name = $request->name;
        $games -> description = $request->description;
        $games -> save();
        return redirect()->route('games.index')->with('status', 'game created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evenements  $evenements
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $games = Games::find($id);
     
        return view('admin.games.show', compact('games'));
    }
}
