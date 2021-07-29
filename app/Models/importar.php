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
class importar extends Model
{

     public $connection = 'wp';

    public $table = 'yIDN2_wc_order_stats';


    public $fillable = [
        'yIDN2_wc_order_stats.order_id',
        'yIDN2_wc_order_stats.date_created',
        'yIDN2_wc_order_stats.num_items_sold',
        'yIDN2_wc_order_stats.total_sales',
        'yIDN2_wc_order_stats.tax_total',
        'yIDN2_wc_order_stats.shipping_total',
        'yIDN2_wc_order_stats.net_total',
        'yIDN2_wc_order_stats.returning_customer',
        'yIDN2_wc_order_stats.status',
        'yIDN2_wc_customer_lookup.username',
        'yIDN2_wc_customer_lookup.first_name',
        'yIDN2_wc_customer_lookup.last_name',
        'yIDN2_wc_customer_lookup.email',
        'yIDN2_wc_customer_lookup.customer_id',
        'yIDN2_wc_customer_lookup.user_id',
        'yIDN2_wc_customer_lookup.country',
        'yIDN2_wc_customer_lookup.postcode',
        'yIDN2_wc_customer_lookup.city',
        'yIDN2_wc_customer_lookup.state',
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
