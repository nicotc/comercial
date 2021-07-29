<?php

namespace App\Repositories;

use App\Models\importar;
use App\Repositories\BaseRepository;

/**
 * Class importarRepository
 * @package App\Repositories
 * @version May 5, 2021, 12:08 am UTC
*/

class importarRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'parent_id',
        'date_created',
        'date_created_gmt',
        'num_items_sold',
        'total_sales',
        'tax_total',
        'shipping_total',
        'net_total',
        'returning_customer',
        'status',
        'customer_id'
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
        return importar::class;
    }
}
