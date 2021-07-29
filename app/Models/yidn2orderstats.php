<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class yidn2orderstats
 * @package App\Models
 * @version April 30, 2021, 9:49 pm UTC
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
class yidn2orderstats extends Model
{
/*     protected $primaryKey = 'order_id';
 */
    public $table = 'yIDN2_wc_order_stats';


    public $fillable = [

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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'order_id' => 'integer',
        'parent_id' => 'integer',
        'date_created' => 'datetime',
        'date_created_gmt' => 'datetime',
        'num_items_sold' => 'integer',
        'total_sales' => 'float',
        'tax_total' => 'float',
        'shipping_total' => 'float',
        'net_total' => 'float',
        'returning_customer' => 'boolean',
        'status' => 'string',
        'customer_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'parent_id' => 'required',
        'date_created' => 'required',
        'date_created_gmt' => 'required',
        'num_items_sold' => 'required|integer',
        'total_sales' => 'required|numeric',
        'tax_total' => 'required|numeric',
        'shipping_total' => 'required|numeric',
        'net_total' => 'required|numeric',
        'returning_customer' => 'nullable|boolean',
        'status' => 'required|string|max:200',
        'customer_id' => 'required'
    ];




}
