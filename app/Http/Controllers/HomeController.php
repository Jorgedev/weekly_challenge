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
     

       return view('home', compact('challenges','yes','no'));        
    }
}
