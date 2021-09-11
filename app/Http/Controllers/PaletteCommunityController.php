<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaletteCommunityController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']); // only authenticated users can come in
    }

    public function index()
    {
        return view('palette.index');
    }
}
