<?php

namespace App\Http\Controllers;

use App\Models\driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getDriver()
    {
        $driver=driver::all();
        return response($driver,200);
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
    $driver=new driver();
    $driver->firstname=$request->firstname;
    $driver->surname=$request->surname;
    $driver->phone=$request->phone;
    $driver->licence=$request->licence;
    $driver->car_id=$request->car_id;
    $driver->save();
    return response($driver,201);
            
        } catch (\Throwable $th) {
            return response($driver,404);
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
        $driver =driver::find($id);

        if ($driver) {

            try {

             $driver->firstname = $request->firstname;
             $driver->surname = $request->surname;
             $driver->phone = $request->phone;
             $driver->license = $request->license;
             $driver->car_id = $request->car_id;
             $driver->update();
                return response()->json(['msg' => 'Driver was changed'], 200);
            } catch (\Throwable $th) {
                return response()->json(['msg' => 'Has a problem'], 404);
            }
        } else {
            return response()->json(['msg' => 'Driver was not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try {
            driver::find($id)->delete();
            return response('ok',200);
            
        } catch (\Throwable $th) {
            return response('not found',404);
        }
    }
}
