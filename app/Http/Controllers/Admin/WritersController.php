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
}
