<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Boiler;
use App\Models\BoilerMaster;
use App\Models\Origin;
class BoilerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $boiler = BoilerMaster::all();
        $origin = Origin::all();
        if($request->ajax())
        {
            $data = Boiler::join('bolier_master','bolier.boiler','bolier_master.id')
            // ->join('bolier_master','bolier.boiler','bolier_master.id')
            ->get();
            return response()->json([
                'data' => $data
            ]);
        }
        return view("boiler",compact('boiler','origin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // return $request->all();
        $boiler = new Boiler;
        $boiler->date = $request->date;
        $boiler->boiler = $request->boiler;
        $boiler->origin = $request->origin;
        $boiler->ready = $request->ready;
        $boiler->reject = $request->rejected;
        $boiler->uncut = $request->uncut;
        $boiler->remain = $request->remain;
        $boiler->save();

        return redirect()->back();

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
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
