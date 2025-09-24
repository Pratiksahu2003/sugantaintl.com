<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoProductionController extends Controller
{
    public function index()
    {
        return view('video-production');
    }
}
