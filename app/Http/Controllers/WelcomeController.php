<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Games;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $games = Games::all(); 

        return view('welcome', compact('games'));
    }
}
