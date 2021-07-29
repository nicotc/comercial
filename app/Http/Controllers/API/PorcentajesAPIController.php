<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePorcentajesAPIRequest;
use App\Http\Requests\API\UpdatePorcentajesAPIRequest;
use App\Models\Porcentajes;
use App\Repositories\PorcentajesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PorcentajesController
 * @package App\Http\Controllers\API
 */

class PorcentajesAPIController extends AppBaseController
{
    /** @var  PorcentajesRepository */
    private $porcentajesRepository;

    public function __construct(PorcentajesRepository $porcentajesRepo)
    {
        $this->porcentajesRepository = $porcentajesRepo;
    }

    /**
     * Display a listing of the Porcentajes.
     * GET|HEAD /porcentajes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $porcentajes = $this->porcentajesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($porcentajes->toArray(), 'Porcentajes retrieved successfully');
    }

    /**
     * Store a newly created Porcentajes in storage.
     * POST /porcentajes
     *
     * @param CreatePorcentajesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePorcentajesAPIRequest $request)
    {
        $input = $request->all();

        $porcentajes = $this->porcentajesRepository->create($input);

        return $this->sendResponse($porcentajes->toArray(), 'Porcentajes saved successfully');
    }

    /**
     * Display the specified Porcentajes.
     * GET|HEAD /porcentajes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Porcentajes $porcentajes */
        $porcentajes = $this->porcentajesRepository->find($id);

        if (empty($porcentajes)) {
            return $this->sendError('Porcentajes not found');
        }

        return $this->sendResponse($porcentajes->toArray(), 'Porcentajes retrieved successfully');
    }

    /**
     * Update the specified Porcentajes in storage.
     * PUT/PATCH /porcentajes/{id}
     *
     * @param int $id
     * @param UpdatePorcentajesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePorcentajesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Porcentajes $porcentajes */
        $porcentajes = $this->porcentajesRepository->find($id);

        if (empty($porcentajes)) {
            return $this->sendError('Porcentajes not found');
        }

        $porcentajes = $this->porcentajesRepository->update($input, $id);

        return $this->sendResponse($porcentajes->toArray(), 'Porcentajes updated successfully');
    }

    /**
     * Remove the specified Porcentajes from storage.
     * DELETE /porcentajes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Porcentajes $porcentajes */
        $porcentajes = $this->porcentajesRepository->find($id);

        if (empty($porcentajes)) {
            return $this->sendError('Porcentajes not found');
        }

        $porcentajes->delete();

        return $this->sendSuccess('Porcentajes deleted successfully');
    }
}
