<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Games;
use App\Models\Tag;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $games = Games::all(); 
        $tags = Tag::all();

        return view('welcome', compact('games','tags'));
    }
}
