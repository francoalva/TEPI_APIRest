<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelo;

use Illuminate\Support\Facades\DB;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelos = DB::select('SELECT a.id, a."MOD_nombre",b."MAR_nombre" 
            FROM modelos a INNER JOIN marcas b ON a."MAR_id" = b.id');

        return $modelos;
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
    public function show($id) //por ID de marca
    {
        $modelos = DB::table('modelos')
                    ->select('modelos.id','modelos.MOD_nombre','marcas.MAR_nombre')
                    ->join('marcas','modelos.MAR_id','=','marcas.id')
                    ->where('marcas.id','=',$id)
                    ->get();
        //DB::select('SELECT a.id, a."MOD_nombre",b."MAR_nombre" 
           // FROM modelos a INNER JOIN marcas b ON a."MAR_id" = b.id AND b.id = {$id}');

        return $modelos;
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
}
