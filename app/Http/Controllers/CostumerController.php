<?php

namespace App\Http\Controllers;

use App\Costumer;
use Illuminate\Http\Request;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costumers = Costumer::orderBy('id', 'desc')->get();
        return response()->json($costumers);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $costumer = new Costumer;
        $costumer->first_name = $request->first_name;
        $costumer->last_name = $request->last_name;
        $costumer->email = $request->email;
        $costumer->save();
        return response()->json($costumer);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $costumer = Costumer::findOrFail($id);
        return response()->json($costumer);
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $costumer = Costumer::findOrFail($id);
        $costumer->first_name = $request->first_name;
        $costumer->last_name = $request->last_name;
        $costumer->email = $request->email;
        $costumer->save();
        return response()->json($costumer);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $costumer = Costumer::findOrFail($id);
        $costumer->delete();
        return response()->json($costumer);
    }
}
