<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class importar_items
 * @package App\Models
 * @version May 5, 2021, 2:00 am UTC
 *
 * @property string $order_item_name
 * @property string $order_item_type
 * @property integer $order_id
 */
class importar_items extends Model
{


    public $table = 'yIDN2_woocommerce_order_items';



    public $connection = "wp";

    public $fillable = [
        'order_item_name',
        'order_item_type',
        'order_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'order_item_id' => 'integer',
        'order_item_name' => 'string',
        'order_item_type' => 'string',
        'order_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'order_item_name' => 'required|string',
        'order_item_type' => 'required|string|max:200',
        'order_id' => 'required'
    ];


}
