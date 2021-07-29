<?php

namespace App\Repositories;

use App\Models\yidn2orderstats;
use App\Repositories\BaseRepository;

/**
 * Class yidn2orderstatsRepository
 * @package App\Repositories
 * @version April 30, 2021, 9:49 pm UTC
*/

class yidn2orderstatsRepository extends BaseRepository
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
        return yidn2orderstats::class;
    }
}
