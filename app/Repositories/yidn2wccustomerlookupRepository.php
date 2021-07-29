<?php

namespace App\Repositories;

use App\Models\yidn2wccustomerlookup;
use App\Repositories\BaseRepository;

/**
 * Class yidn2wccustomerlookupRepository
 * @package App\Repositories
 * @version April 30, 2021, 9:49 pm UTC
*/

class yidn2wccustomerlookupRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'username',
        'first_name',
        'last_name',
        'email',
        'date_last_active',
        'date_registered',
        'country',
        'postcode',
        'city',
        'state'
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
        return yidn2wccustomerlookup::class;
    }
}
