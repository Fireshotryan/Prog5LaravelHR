<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagsStoreRequest;
use App\Http\Requests\TagsUpdateRequest;

class TagsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
{
 
    $tags = Tag::all();

    if (auth()->user()->role == 1 || auth()->user()->role == 2) {
        return view('admin.tags.index', compact('tags'));
    } else {
        return view('home', compact('tags'));
    }
}

    public function create()
    {
        if (auth()->user()->role == 1 || auth()->user()->role == 2) {
            return view('admin.tags.create');
        }
        else {
            return view('home');
        }
    }

    public function store(TagsStoreRequest $request)
    {
        $tags = new Tag();
        $tags -> name = $request->name;
        $tags -> save();
        return redirect()->route('tags.index')->with('status', 'Tag created');
    }

    public function show($id)
    {
        $tags = Tag::find($id);

        if (auth()->user()->role == 1 || auth()->user()->role == 2) {
            return view('admin.tags.show', compact('tags'));
        }
        else {
            return view('home', compact('tags'));
        }
    }

    public function edit(Tag $tags, $id)
    {
        $tags = Tag::find($id);

        if(auth()->user()->role == 2) {
            return view('admin.tags.edit', compact('tags'));
        }
        else {
            return view('home', compact('tags'));
        }
    }

    public function update(TagsUpdateRequest $request, $id)
    {
        $tags = Tag::find($id);
        $tags->name = $request->name;
        $tags->save();
        return redirect()->route('tags.index')->with('status', 'Tag Updated');
    }

    public function delete(Tag $tags)
    {

        if(auth()->user()->role == 2) {
            return view('admin.tags.delete', compact('tags'));
        }
        else {
            return view('home', compact('tags'));
        }
    }

    public function destroy(Tag $tags, $id)
    {
        $tags = Tag::find($id);
        $tags->delete();
        return redirect()->route('tags.index')->with('status', 'Tag deleted');
    }
}