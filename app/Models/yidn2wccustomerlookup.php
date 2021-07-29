<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class yidn2wccustomerlookup
 * @package App\Models
 * @version April 30, 2021, 9:49 pm UTC
 *
 * @property integer $user_id
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string|\Carbon\Carbon $date_last_active
 * @property string|\Carbon\Carbon $date_registered
 * @property string $country
 * @property string $postcode
 * @property string $city
 * @property string $state
 */
class yidn2wccustomerlookup extends Model
{

    public $table = 'yIDN2_wc_customer_lookup';




    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'customer_id' => 'integer',
        'user_id' => 'integer',
        'username' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'date_last_active' => 'datetime',
        'date_registered' => 'datetime',
        'country' => 'string',
        'postcode' => 'string',
        'city' => 'string',
        'state' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'nullable',
        'username' => 'required|string|max:60',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'nullable|string|max:100',
        'date_last_active' => 'nullable',
        'date_registered' => 'nullable',
        'country' => 'required|string|max:2',
        'postcode' => 'required|string|max:20',
        'city' => 'required|string|max:100',
        'state' => 'required|string|max:100'
    ];


}
