<?php

namespace App\Http\Controllers;

use App\DataTables\PorcentajesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePorcentajesRequest;
use App\Http\Requests\UpdatePorcentajesRequest;
use App\Repositories\PorcentajesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PorcentajesController extends AppBaseController
{
    /** @var  PorcentajesRepository */
    private $porcentajesRepository;

    public function __construct(PorcentajesRepository $porcentajesRepo)
    {
        $this->porcentajesRepository = $porcentajesRepo;
    }

    /**
     * Display a listing of the Porcentajes.
     *
     * @param PorcentajesDataTable $porcentajesDataTable
     * @return Response
     */
    public function index(PorcentajesDataTable $porcentajesDataTable)
    {
        return $porcentajesDataTable->render('porcentajes.index');
    }

    /**
     * Show the form for creating a new Porcentajes.
     *
     * @return Response
     */
    public function create()
    {
        return view('porcentajes.create');
    }

    /**
     * Store a newly created Porcentajes in storage.
     *
     * @param CreatePorcentajesRequest $request
     *
     * @return Response
     */
    public function store(CreatePorcentajesRequest $request)
    {
        $input = $request->all();

        $porcentajes = $this->porcentajesRepository->create($input);

        Flash::success('Porcentajes saved successfully.');

        return redirect(route('porcentajes.index'));
    }

    /**
     * Display the specified Porcentajes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $porcentajes = $this->porcentajesRepository->find($id);

        if (empty($porcentajes)) {
            Flash::error('Porcentajes not found');

            return redirect(route('porcentajes.index'));
        }

        return view('porcentajes.show')->with('porcentajes', $porcentajes);
    }

    /**
     * Show the form for editing the specified Porcentajes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $porcentajes = $this->porcentajesRepository->find($id);

        if (empty($porcentajes)) {
            Flash::error('Porcentajes not found');

            return redirect(route('porcentajes.index'));
        }

        return view('porcentajes.edit')->with('porcentajes', $porcentajes);
    }

    /**
     * Update the specified Porcentajes in storage.
     *
     * @param  int              $id
     * @param UpdatePorcentajesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePorcentajesRequest $request)
    {
        $porcentajes = $this->porcentajesRepository->find($id);

        if (empty($porcentajes)) {
            Flash::error('Porcentajes not found');

            return redirect(route('porcentajes.index'));
        }

        $porcentajes = $this->porcentajesRepository->update($request->all(), $id);

        Flash::success('Porcentajes updated successfully.');

        return redirect(route('porcentajes.index'));
    }

    /**
     * Remove the specified Porcentajes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $porcentajes = $this->porcentajesRepository->find($id);

        if (empty($porcentajes)) {
            Flash::error('Porcentajes not found');

            return redirect(route('porcentajes.index'));
        }

        $this->porcentajesRepository->delete($id);

        Flash::success('Porcentajes deleted successfully.');

        return redirect(route('porcentajes.index'));
    }
}
