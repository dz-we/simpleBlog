<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

  
    public function index()
    {

        $posts = Auth::user()->posts;
        return view('home', compact('posts'));
    }
}
