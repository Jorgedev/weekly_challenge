<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;

class HomeController extends Controller
{
    private $challenge;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Challenge $challenge)
    {
        $this->middleware('auth');
        $this->challenge = $challenge;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $challenges = $this->challenge->get();
        return view('home', compact('challenges'));        
    }
}
