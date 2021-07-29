<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ordenes;
use App\Models\ordenesitems;
use Illuminate\Http\Request;


class UorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        dd($request->all());
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

        $ordenes = ordenes::find($id);
        $ordenes->users_id = $request['usuario'];
        $ordenes->save();





        $ordenesitems =   ordenesitems::select(
            'ordenes_items.id',
            'ordenes_items.ordenes_id',
            'ordenes_items.order_item_id',
            'ordenes_items.name',
            'ordenes_items.product_id',
            'ordenes_items.variation_id',
            'ordenes_items.cantidad',
            'ordenes_items.total',
            'ordenes_items.abonado',
            'ordenes_items.personalizacion',
            'ordenes_items.created_at',
            'ordenes_items.updated_at',
            'ordenes_items.deleted_at'
        )->where('ordenes_id', '=', $ordenes->order_id )->get();

        $usuarios = User::pluck('email','id');




        $estados = ['PENDIENTE', 'NEGOCIACIÓN', 'TALLER', 'PENDIENTE DE PAGO', 'LISTO PARA ENVIAR',
        'ENVIADO', 'PRE-NEGOCIACIÓN'];

        if (empty($ordenes)) {
            Flash::error('Ordenes not found');

            return redirect(route('ordenes.index'));
        }

        return view('ordenes.show', ['ordenesitems' => $ordenesitems, 'usuarios' => $usuarios, 'estados'=>$estados])->with('ordenes', $ordenes);

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
