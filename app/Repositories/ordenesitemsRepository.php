<?php

namespace App\Repositories;

use App\Models\ordenesitems;
use App\Repositories\BaseRepository;

/**
 * Class ordenesitemsRepository
 * @package App\Repositories
 * @version May 6, 2021, 3:20 am UTC
*/

class ordenesitemsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ordenes_id',
        'order_item_id',
        'name',
        'product_id',
        'variation_id',
        'cantidad',
        'total',
        'abonado',
        'personalizacion'
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
        return ordenesitems::class;
    }
}
