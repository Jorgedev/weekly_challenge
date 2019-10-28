<?php

namespace App\Http\Controllers;
use App\Models\Week;

use Illuminate\Http\Request;

class WeekController extends Controller
{
    private $week;

    public function __construct(Week $week)
    {
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
        //
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
    public function update(Request $request, $challenge, $id)
    {
        if(!$week = $this->week->find($id))
            return redirect()->back();
        if($week->deposit_status == 'no')
        {
            $week->deposit_status = 'yes';
        }else{
            $week->deposit_status = 'no';
        }
        $week->update($request->all());

        return redirect()->back()->with('success', 'A '.$week->order.' ª semana foi atualizada com sucesso!');   
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
