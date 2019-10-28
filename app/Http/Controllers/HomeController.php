<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;
use App\Models\Medal;

class HomeController extends Controller
{
    private $challenge;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Challenge $challenge, Medal $medal)
    {
        $this->middleware('auth');
        $this->challenge = $challenge;
        $this->medal = $medal;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $challenges = $this->challenge->paginate(5);
        $medals = auth()->user()->medals;
        
    	$yes = 0; 
		$no = 0;
        foreach($challenges as $key => $challenge){
            foreach($challenge->weeks as $week){
				if($week->deposit_status == 'yes'){
					$yes += $week->deposited_amount;
				}else{
			        $no += $week->deposited_amount;
				}
            }
        }

       return view('home', compact('challenges','medals','yes','no'));        
    }
}
