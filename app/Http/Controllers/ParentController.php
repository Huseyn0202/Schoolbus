<?php

namespace App\Http\Controllers;

use App\Models\parrent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getParent()
    {
        $parent=parrent::all();
        return response($parent,201);
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
            $parrent = new parrent();
            $parrent->firstname = $request->firstname;
            $parrent->surname = $request->surname;
            $parrent->phone = $request->phone;
            $parrent->email = $request->email;
            $parrent->save();
            return response($parrent, Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response($parrent, Response::HTTP_BAD_REQUEST);
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
        $parent =parrent::find($id);

        if ($parent) {

            try {

                $parent->firstname = $request->firstname;
                $parent->surname = $request->surname;
                $parent->phone = $request->phone;
                $parent->email = $request->email;
                $parent->update();
                return response()->json(['msg' => 'Parrent was changed'], 200);
            } catch (\Throwable $th) {
                return response()->json(['msg' => 'Has a problem'], 404);
            }
        } else {
            return response()->json(['msg' => 'Parrent was not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete( $id)
    {
        try {
            parrent::find($id)->delete();
            return response('ok',200);
            
        } catch (\Throwable $th) {
            return response('not found',404);
        }
    }
}
