<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Games;
use App\Models\Tag;


class SearchController extends Controller
{
    public function index(Request $request)
{
    $query = $request->input('query');
    $selectedTag = $request->input('tag'); // Get the selected tag

    // Start with a base query
    $searchQuery = Games::where('game_status', true);

    if (!empty($query)) {
        // Add name and description search conditions
        $searchQuery->where(function ($q) use ($query) {
            $q->where('name', 'like', "%$query%")
                ->orWhere('description', 'like', "%$query%");
        });
    }

    if (!empty($selectedTag)) {
        // Filter by the selected tag
        $searchQuery->whereHas('tags', function ($q) use ($selectedTag) {
            $q->where('tags.id', $selectedTag); // Specify the table name to disambiguate
        });
    }
    

    // Get the search results
    $searchResults = $searchQuery->get();

    // Get all tags to populate the dropdown in the view
    $tags = Tag::all();

    return view('search.index', compact('searchResults', 'tags'));
}
    
}