<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Models\ordenes;
use App\Models\ordenesitems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ordenesitemsRepository;
use App\Http\Requests\CreateordenesitemsRequest;
use App\Http\Requests\UpdateordenesitemsRequest;
use App\Models\User;

class ordenesitemsController extends AppBaseController
{
    /** @var  ordenesitemsRepository */
    private $ordenesitemsRepository;

    public function __construct(ordenesitemsRepository $ordenesitemsRepo)
    {
        $this->ordenesitemsRepository = $ordenesitemsRepo;
    }

    /**
     * Display a listing of the ordenesitems.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $ordenesitems = $this->ordenesitemsRepository->all();

        return view('ordenesitems.index')
            ->with('ordenesitems', $ordenesitems);
    }

    /**
     * Show the form for creating a new ordenesitems.
     *
     * @return Response
     */
    public function create()
    {
        return view('ordenesitems.create');
    }

    /**
     * Store a newly created ordenesitems in storage.
     *
     * @param CreateordenesitemsRequest $request
     *
     * @return Response
     */
    public function store(CreateordenesitemsRequest $request)
    {
        $input = $request->all();

        $ordenesitems = $this->ordenesitemsRepository->create($input);


        $order_id = $input['ordenes_id'];

        $sumas = DB::table('ordenes_items')
        ->select(DB::raw('SUM(total) AS sum_total'), DB::raw('SUM(abonado) AS sum_abonado'))
        ->where('ordenes_id', '=', $order_id )

        ->first();





        $orders = ordenes::where('order_id', '=', $order_id)
        ->update([
            'total_ventas' => $sumas->sum_total,
            'total_pagado' => $sumas->sum_abonado
        ]);



        $ordenes = ordenes::where('order_id', '=', $order_id)->first();


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



        $estados = ['PENDIENTE', 'NEGOCIACIÓN', 'TALLER', 'PENDIENTE DE PAGO', 'LISTO PARA ENVIAR', 'ENVIADO', 'PRE-NEGOCIACIÓN'];

        if (empty($ordenes)) {
            Flash::error('Ordenes not found');

            return redirect(route('ordenes.index'));
        }

        return view('ordenes.show', ['ordenesitems' => $ordenesitems, 'usuarios' => $usuarios, 'estados'=>$estados])->with('ordenes', $ordenes);




    /*     Flash::success('Ordenesitems saved successfully.');

        return redirect(route('ordenesitems.index')); */
    }

    /**
     * Display the specified ordenesitems.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ordenesitems = $this->ordenesitemsRepository->find($id);

        if (empty($ordenesitems)) {
            Flash::error('Ordenesitems not found');

            return redirect(route('ordenesitems.index'));
        }

        return view('ordenesitems.show')->with('ordenesitems', $ordenesitems);
    }

    /**
     * Show the form for editing the specified ordenesitems.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ordenesitems = $this->ordenesitemsRepository->find($id);

        if (empty($ordenesitems)) {
            Flash::error('Ordenesitems not found');

            return redirect(route('ordenesitems.index'));
        }

        return view('ordenesitems.edit')->with('ordenesitems', $ordenesitems);
    }

    /**
     * Update the specified ordenesitems in storage.
     *
     * @param int $id
     * @param UpdateordenesitemsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateordenesitemsRequest $request)
    {

$input = $request->all();

        $ordenesitems = $this->ordenesitemsRepository->find($id);

        if (empty($ordenesitems)) {
            Flash::error('Ordenesitems not found');

            return redirect(route('ordenesitems.index'));
        }

        $ordenesitems = $this->ordenesitemsRepository->update($request->all(), $id);



        $order_id = $input['ordenes_id'];

        $sumas = DB::table('ordenes_items')
        ->select(DB::raw('SUM(total) AS sum_total'), DB::raw('SUM(abonado) AS sum_abonado'))
        ->where('ordenes_id', '=', $order_id )

        ->first();





        $orders = ordenes::where('order_id', '=', $order_id)
        ->update([
            'total_ventas' => $sumas->sum_total,
            'total_pagado' => $sumas->sum_abonado
        ]);



        $ordenes = ordenes::where('order_id', '=', $order_id)->first();


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



        $estados = ['PENDIENTE', 'NEGOCIACIÓN', 'TALLER', 'PENDIENTE DE PAGO', 'LISTO PARA ENVIAR', 'ENVIADO', 'PRE-NEGOCIACIÓN'];

        if (empty($ordenes)) {
            Flash::error('Ordenes not found');

            return redirect(route('ordenes.index'));
        }

        return view('ordenes.show', ['ordenesitems' => $ordenesitems, 'usuarios' => $usuarios, 'estados'=>$estados])->with('ordenes', $ordenes);








    }

    /**
     * Remove the specified ordenesitems from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ordenesitems = $this->ordenesitemsRepository->find($id);

        if (empty($ordenesitems)) {
            Flash::error('Ordenesitems not found');

            return redirect(route('ordenesitems.index'));
        }

        $this->ordenesitemsRepository->delete($id);



        $order_id = $ordenesitems->ordenes_id;



        $sumas = DB::table('ordenes_items')
        ->select(DB::raw('SUM(total) AS sum_total'), DB::raw('SUM(abonado) AS sum_abonado'))
        ->where('ordenes_id', '=', $order_id )


        ->first();





        $orders = ordenes::where('order_id', '=', $order_id)
        ->update([
            'total_ventas' => $sumas->sum_total,
            'total_pagado' => $sumas->sum_abonado
        ]);



        $ordenes = ordenes::where('order_id', '=', $order_id)->first();


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



        $estados = ['PENDIENTE', 'NEGOCIACIÓN', 'TALLER', 'PENDIENTE DE PAGO', 'LISTO PARA ENVIAR', 'ENVIADO', 'PRE-NEGOCIACIÓN'];

        if (empty($ordenes)) {
            Flash::error('Ordenes not found');

            return redirect(route('ordenes.index'));
        }



        Flash::success('Ordenesitems deleted successfully.');
        return back()->withInput();
      //  return redirect(route('ordenesitems.index'));
    }
}
