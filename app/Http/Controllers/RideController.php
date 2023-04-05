<?php

namespace App\Http\Controllers;

use App\Models\ride;
use Illuminate\Http\Request;

class RideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getRide()
    {
        $ride=ride::all();
        return response($ride,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function add(Request $request)
    {
        try {
            $ride = new ride();
            $ride->isStarted = $request->isStarted;
            $ride->driver_id = $request->driver_id;
            $ride->address_id = $request->address_id;
            $ride->direction = $request->direction;
            $ride->save();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $ride =ride::find($id);

        if ($ride) {

            try {

                $ride->isStarted = $request->isStarted;
                $ride->driver_id = $request->driver_id;
                $ride->address_id = $request->address_id;
                $ride->direction = $request->direction;
                $ride->update();
                return response()->json(['msg' => 'Ride was changed'], 200);
            } catch (\Throwable $th) {
                return response()->json(['msg' => 'Has a problem'], 404);
            }
        } else {
            return response()->json(['msg' => 'Ride was not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try {
            ride::find($id)->delete();
            return response('ok',200);
            
        } catch (\Throwable $th) {
            return response('not found',404);
        }
    }
}
