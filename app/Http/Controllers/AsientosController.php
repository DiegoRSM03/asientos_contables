<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asiento;

class AsientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \IllWuminate\Http\Response
     */
    public function index()
    {
		return Asiento::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$asiento = new Asiento;

		$asiento->id = $request->id;
		$asiento->date = $request->date;
		$asiento->description = $request->description;
		$asiento->debe = $request->debe;
		$asiento->haber = $request->haber;
		$asiento->debe_mount = $request->debe_mount;
		$asiento->haber_mount = $request->haber_mount;

		$asiento->save();

		return json_encode(['status' => 'successful']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Asiento::find($id);
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
	
	public function totalAsientos()
    {
        return Asiento::count();
	}

}
