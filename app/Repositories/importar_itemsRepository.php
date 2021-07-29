<?php

namespace App\Repositories;

use App\Models\importar_items;
use App\Repositories\BaseRepository;

/**
 * Class importar_itemsRepository
 * @package App\Repositories
 * @version May 5, 2021, 2:00 am UTC
*/

class importar_itemsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'order_item_name',
        'order_item_type',
        'order_id'
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
        return importar_items::class;
    }
}
