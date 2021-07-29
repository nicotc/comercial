<?php

namespace App\Repositories;

use App\Models\Porcentajes;
use App\Repositories\BaseRepository;

/**
 * Class PorcentajesRepository
 * @package App\Repositories
 * @version May 12, 2021, 5:17 pm UTC
*/

class PorcentajesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'porcentaje'
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
        return Porcentajes::class;
    }
}
