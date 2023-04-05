<?php

namespace App\Http\Controllers;

use App\Models\car;
use Exception;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getCar()
    {
        $cars = Car::all();

        response($cars, 200);
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
            $car = new car();
            $car->model = $request->model;
            $car->vendor = $request->vendor;
            $car->serialnumber = $request->serialnumber;
            $car->seatCount = $request->setCount;
            $car->save();
            return response($car, 201);
        } catch (\Throwable $th) {
            return response($car, 404);
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

        $car = car::find($id);

        if ($car) {

            try {

                $car->model = $request->model;
                $car->vendor = $request->vendor;
                $car->serialnumber = $request->serialnumber;
                $car->seatCount = $request->setCount;
                $car->update();
                return response()->json(['msg' => 'Car was changed'], 200);
            } catch (\Throwable $th) {
                return response()->json(['msg' => 'Has a problem'], 404);
            }
        } else {
            return response()->json(['msg' => 'Car was not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try {
            car::find($id)->delete();
            return response('ok', 200);
        } catch (\Throwable $th) {
            return response('not found', 404);
        }
    }
}
