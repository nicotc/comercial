<?php

namespace App\Http\Controllers;

use App\DataTables\ordenesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateordenesRequest;
use App\Http\Requests\UpdateordenesRequest;
use App\Repositories\ordenesRepository;
use Flash;
use App\Models\ordenesitems;
use App\Models\ordenes;

use App\Http\Controllers\AppBaseController;
use App\Models\User;
use Response;

class ordenesController extends AppBaseController
{
    /** @var  ordenesRepository */
    private $ordenesRepository;

    public function __construct(ordenesRepository $ordenesRepo)
    {
        $this->ordenesRepository = $ordenesRepo;
    }

    /**
     * Display a listing of the ordenes.
     *
     * @param ordenesDataTable $ordenesDataTable
     * @return Response
     */
    public function index(ordenesDataTable $ordenesDataTable)
    {
        return $ordenesDataTable->render('ordenes.index');
    }

    /**
     * Show the form for creating a new ordenes.
     *
     * @return Response
     */
    public function create()
    {
        return view('ordenes.create');
    }

    /**
     * Store a newly created ordenes in storage.
     *
     * @param CreateordenesRequest $request
     *
     * @return Response
     */
    public function store(CreateordenesRequest $request)
    {


        $input = $request->all();

        $ordenes = $this->ordenesRepository->create($input);

        Flash::success('Ordenes saved successfully.');

        return redirect(route('ordenes.index'));
    }

    /**
     * Display the specified ordenes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ordenes = $this->ordenesRepository->find($id);


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



        $estados =
        [
        'PENDIENTE',
        'NEGOCIACIÓN',
        'TALLER',
        'PENDIENTE DE PAGO',
        'LISTO PARA ENVIAR',
        'ENVIADO',
        'PRE-NEGOCIACIÓN'
        ];

        if (empty($ordenes)) {
            Flash::error('Ordenes not found');

            return redirect(route('ordenes.index'));
        }

        return view('ordenes.show', ['ordenesitems' => $ordenesitems, 'usuarios' => $usuarios, 'estados'=>$estados])->with('ordenes', $ordenes);
    }

    /**
     * Show the form for editing the specified ordenes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ordenes = $this->ordenesRepository->find($id);

        if (empty($ordenes)) {
            Flash::error('Ordenes not found');

            return redirect(route('ordenes.index'));
        }

        return view('ordenes.edit')->with('ordenes', $ordenes);
    }

    /**
     * Update the specified ordenes in storage.
     *
     * @param  int              $id
     * @param UpdateordenesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateordenesRequest $request)
    {
        $ordenes = $this->ordenesRepository->find($id);

        if (empty($ordenes)) {
            Flash::error('Ordenes not found');

            return redirect(route('ordenes.index'));
        }

        $ordenes = $this->ordenesRepository->update($request->all(), $id);



        Flash::success('Ordenes updated successfully.');

        return redirect(route('ordenes.index'));
    }

    /**
     * Remove the specified ordenes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ordenes = $this->ordenesRepository->find($id);

        if (empty($ordenes)) {
            Flash::error('Ordenes not found');

            return redirect(route('ordenes.index'));
        }

        $this->ordenesRepository->delete($id);

        ordenesitems::where('ordenes_id', '=', $ordenes->order_id)->delete();



        Flash::success('Ordenes deleted successfully.');

        return redirect(route('ordenes.index'));
    }
}
