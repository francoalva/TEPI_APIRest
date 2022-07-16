<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dispositivo;
use Illuminate\Support\Facades\DB;


class DispositivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dispositivos = Dispositivo::all();

        return $dispositivos;
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
    public function showByModelo($id)
    {
        $dispositivos = DB::table('dispositivos')
                    ->select('dispositivos.id','dispositivos.DIS_nombre','modelos.MOD_nombre','marcas.MAR_nombre')
                    ->join('modelos','modelos.id','=','dispositivos.MOD_id')
                    ->join('marcas','modelos.MAR_id','=','marcas.id')
                    ->where('modelos.id','=',$id)
                    ->get();

        return $dispositivos;
    }

    public function showByMarca($id)
    {
        $dispositivos = DB::table('dispositivos')
                    ->select('dispositivos.id','dispositivos.DIS_nombre','modelos.MOD_nombre','marcas.MAR_nombre')
                    ->join('modelos','modelos.id','=','dispositivos.MOD_id')
                    ->join('marcas','modelos.MAR_id','=','marcas.id')
                    ->where('marcas.id','=',$id)
                    ->get();

        return $dispositivos;
    }

    public function showByBodega($id)
    {
        $dispositivos = DB::table('dispositivos')
                    ->select('dispositivos.id','dispositivos.DIS_nombre','modelos.MOD_nombre','marcas.MAR_nombre')
                    ->join('modelos','modelos.id','=','dispositivos.MOD_id')
                    ->join('marcas','modelos.MAR_id','=','marcas.id')
                    ->join('bodegas','dispositivos.BOD_id','=','bodegas.id')
                    ->where('bodegas.id','=',$id)
                    ->get();

        return $dispositivos;
    }

    public function filterBy($bodega,$marca,$modelo)
    {
        $dispositivos = DB::table('dispositivos')
                    ->select('dispositivos.id','dispositivos.DIS_nombre','modelos.MOD_nombre','marcas.MAR_nombre', 'bodegas.nombre')
                    ->join('modelos','modelos.id','=','dispositivos.MOD_id')
                    ->join('marcas','modelos.MAR_id','=','marcas.id')
                    ->join('bodegas','dispositivos.BOD_id','=','bodegas.id');
        
        if ($bodega > 0 ) {
            $dispositivos = $dispositivos->where('bodegas.id','=',$bodega);
        }
        if ($marca > 0 ) {
            $dispositivos = $dispositivos->where('marcas.id','=',$marca);
        }
        if ($modelo > 0 ) {
            $dispositivos = $dispositivos->where('marcas.id','=',$modelo);
        }

        return $dispositivos->get();
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
