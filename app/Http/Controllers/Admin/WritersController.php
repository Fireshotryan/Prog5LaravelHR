<?php

namespace App\Http\Controllers\Admin;

use App\Models\Writers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\WritersStoreRequest;
use App\Http\Requests\WritersUpdateRequest;

class WritersController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $writers = Writers::all();

        return view('admin.writers.index', compact('writers'));
    }
    public function create()
    {
        return view('admin.writers.create');
    }
    
    public function store(WritersStoreRequest $request)
    {
        $writers = new Writers();
        $writers -> name = $request->name;
        $writers -> save();
        return redirect()->route('writers.index')->with('status', 'Writer created');
    }
    
    public function show($id)
    {
        $writers = Writers::find($id);
     
        return view('admin.writers.show', compact('writers'));
    }

    public function edit(Writers $writers, $id)
    {
        $writers = Writers::find($id);

        return view('admin.writers.edit', compact('writers'));
    }

    public function update(WritersUpdateRequest $request, $id)
    {
        $writers = Writers::find($id);
        $writers->name = $request->name;
        $writers->save();
        return redirect()->route('writers.index')->with('status', 'Writer Updated');
    }

    public function delete(Writers $writers)
    {
        return view('admin.writers.delete', compact('writers'));
    }

    public function destroy(Writers $writers, $id)
    {
        $writers = Writers::find($id);
        $writers->delete();
        return redirect()->route('writers.index')->with('status', 'Writer deleted');
    }
}
