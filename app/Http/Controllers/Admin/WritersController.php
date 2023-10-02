<?php

namespace App\Http\Controllers\Admin;

use App\Models\Writers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

}
