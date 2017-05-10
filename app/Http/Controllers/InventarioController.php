<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Inventario;
class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        if ($request) {
            $query=trim($request->get('buscar'));
            $inventario = DB::table('inventario as i')
            ->join('Farmacos as f','i.id','=','f.id')
            ->select('f.nombre','f.presentacion','f.codigo','i.cantidad','i.precio_venta','i.precio_compra','i.id')
            ->where('f.nombre','LIKE','%'.$query.'%')
            ->orderBy('f.id','asc')
            ->paginate(7);
        
            return view('inventario.index',["inventario"=>$inventario,"buscar"=>$query]);
        }
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
    public function show($id)
    {
        //
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