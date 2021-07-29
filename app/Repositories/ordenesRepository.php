<?php

namespace App\Repositories;

use App\Models\ordenes;
use App\Repositories\BaseRepository;

/**
 * Class ordenesRepository
 * @package App\Repositories
 * @version May 3, 2021, 8:19 pm UTC
*/

class ordenesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'order_id',
        'status',
        'usuario',
        'nombre',
        'apellido',
        'total_ventas',
        'total_pagado'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ordenes::class;
    }
}
