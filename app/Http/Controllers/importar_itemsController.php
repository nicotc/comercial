<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use Illuminate\Http\Request;

use App\DataTables\importar_itemsDataTable;
use App\Http\Controllers\AppBaseController;
use App\Repositories\importar_itemsRepository;
use App\Http\Requests\Createimportar_itemsRequest;
use App\Http\Requests\Updateimportar_itemsRequest;

class importar_itemsController extends AppBaseController
{
    /** @var  importar_itemsRepository */
    private $importarItemsRepository;

    public function __construct()
    {

    }

    /**
     * Display a listing of the importar_items.
     *
     * @param importar_itemsDataTable $importarItemsDataTable
     * @return Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new importar_items.
     *
     * @return Response
     */
    public function create()
    {
        return view('importar_items.create');
    }

    /**
     * Store a newly created importar_items in storage.
     *
     * @param Createimportar_itemsRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {

        dd($request->all());

    }

    /**
     * Display the specified importar_items.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified importar_items.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified importar_items in storage.
     *
     * @param  int              $id
     * @param Updateimportar_itemsRequest $request
     *
     * @return Response
     */
    public function update($id, Updateimportar_itemsRequest $request)
    {

    }

    /**
     * Remove the specified importar_items from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {

    }
}
