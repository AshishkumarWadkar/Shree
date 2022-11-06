<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boiler;
use App\Models\OriginMaster;


class BoilerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $boiler = Boiler::all();
        $origin = OriginMaster::all();
       
        return view("boiler",compact('boiler','origin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $boiler             = new Boiler;
        $boiler->date       = $request->date;
        $boiler->boiler     = $request->boiler;
        $boiler->origin     = $request->origin;
        $boiler->ready      = $request->ready;
        $boiler->reject     = $request->rejected;
        $boiler->uncut      = $request->uncut;
        $boiler->remain     = $request->remain;
        $boiler->save();

        return redirect()->route('boiler.index');
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
        $boiler     = Boiler::find($id);
        $origin     = OriginMaster::all();

        return view("boiler_edit",compact('boiler','origin'));
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
        return "hii";
        $boiler             = Boiler::find($id) ; 
        $boiler->date       = $request->date;
        $boiler->boiler     = $request->boiler;
        $boiler->origin     = $request->origin;
        $boiler->ready      = $request->ready;
        $boiler->reject     = $request->rejected;
        $boiler->uncut      = $request->uncut;
        $boiler->remain     = $request->remain;
        $boiler->save();

        return redirect()->route('boiler.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $boiler    = Boiler::find($id); 
        $boiler->delete();
        
    }
}
