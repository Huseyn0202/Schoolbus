<?php

namespace App\Http\Controllers;

use App\Models\ride;
use App\Models\rideAddress;
use App\Models\student;
use App\Models\parrent;
use Illuminate\Http\Request;

class RideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getRide()
    {
        $ride = ride::all();
        return response($ride, 200);
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

            $ride->isStarted = false;

            $ride->driver_id = $request->driver_id;

            $ride->direction = $request->direction;

            $ride->save();

            foreach ($request->addresses as $address) {

                $rideAddress = new rideAddress();

                $rideAddress->ride_id = $ride->id;

                $rideAddress->address_id = $address->address_id;

                $rideAddress->save();
            }
            return response("Ok", 201);
        } catch (\Throwable $th) {
            return response('Not found', 404);
        }
    }

    public function StartRide($id)
    {
        try {
            //code...
            $ride = ride::find($id);
            $ride->isStarted = true;
            $ride->update();
            return response("Ok", 200);
        } catch (\Throwable $th) {
            return response('Not found', 404);
        }
    }

    public function EndRide($id)
    {
        try {
            $ride = ride::find($id);
            $ride->isStarted = false;
            $ride->update();
            return response("Ok", 200);
        } catch (\Throwable $th) {
            return response('Not found', 404);
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
    public function update(Request $request, $id)
    {
        $ride = ride::find($id);

        if ($ride) {

            try {

                $ride = new ride();
    
                $ride->isStarted = false;
    
                $ride->driver_id = $request->driver_id;
    
                $ride->direction = $request->direction;
    
                $ride->update();
    
                foreach ($request->addresses as $address) {
    
                    $rideAddress = new rideAddress();
    
                    $rideAddress->ride_id = $ride->id;
    
                    $rideAddress->address_id = $address->address_id;
    
                    $rideAddress->update();
                }
                return response("Ok", 200);
            } catch (\Throwable $th) {
                return response('Not found', 404);
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
            return response('ok', 200);
        } catch (\Throwable $th) {
            return response('not found', 404);
        }
    }
}
