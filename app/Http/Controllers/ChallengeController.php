<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;
use App\Models\Week;
use Carbon\Carbon;


class ChallengeController extends Controller
{
    private $challenge;
    private $week;

    /**
     * Create a new controller instance.
     *
     * @return void
     */    
    public function __construct(Challenge $challenge, Week $week)
    {
        $this->challenge = $challenge;
        $this->week = $week;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $challenge = auth()->user()->challenges()->create($request->all());   
        $accumulated = $deposit = 0;
        for ($i=1; $i <= $challenge->weeks; $i++) { 
            $deposit += $challenge->amount;
            $accumulated += $deposit;
            $week = $challenge->weeks()->create([
                'deposited_amount' => $deposit,
                'deposit_at' => Carbon::now()->addDays(7*$i),
            ]);   
        }
        return redirect()->back()->with('success', 'Objetivo cadastrado com sucesso!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
