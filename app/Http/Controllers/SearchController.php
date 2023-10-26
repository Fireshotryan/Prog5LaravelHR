<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Games;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
    
        // Perform the search query to get the search results
        $searchResults = Games::where('game_status', true)
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%$query%")
                  ->orWhere('description', 'like', "%$query%");
            })
            ->get();
    
        return view('search.index', compact('searchResults'));
    }
    
}