<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class importar
 * @package App\Models
 * @version May 5, 2021, 12:08 am UTC
 *
 * @property integer $parent_id
 * @property string|\Carbon\Carbon $date_created
 * @property string|\Carbon\Carbon $date_created_gmt
 * @property integer $num_items_sold
 * @property number $total_sales
 * @property number $tax_total
 * @property number $shipping_total
 * @property number $net_total
 * @property boolean $returning_customer
 * @property string $status
 * @property integer $customer_id
 */
class vista extends Model
{

     public $connection = 'wp';

    public $table = 'ordenes';

    public $fillable = [
        'order_id',
        'date_created',
        'num_items_sold',
        'total_sales',
        'tax_total',
        'shipping_total',
        'net_total',
        'returning_customer',
        'status',
        'username',
        'first_name',
        'last_name',
        'email',
        'customer_id',
        'user_id',
        'country',
        'postcode',
        'city',
        'state',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

}
