<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class ordenesitems
 * @package App\Models
 * @version May 6, 2021, 3:20 am UTC
 *
 * @property integer $ordenes_id
 * @property integer $order_item_id
 * @property string $name
 * @property integer $product_id
 * @property integer $variation_id
 * @property string $cantidad
 * @property string $total
 * @property string $abonado
 * @property string $personalizacion
 */
class ordenesitems extends Model
{

    public $table = 'ordenes_items';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';





    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ordenes_id' => 'integer',
        'order_item_id' => 'integer',
        'name' => 'string',
        'product_id' => 'integer',
        'variation_id' => 'integer',
        'cantidad' => 'string',
        'total' => 'string',
        'abonado' => 'string',
        'personalizacion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ordenes_id' => 'nullable|integer',
        'order_item_id' => 'nullable|integer',
        'name' => 'nullable|string|max:255',
        'product_id' => 'nullable|integer',
        'variation_id' => 'nullable|integer',
        'cantidad' => 'nullable|string|max:255',
        'total' => 'nullable|string|max:255',
        'abonado' => 'nullable|string|max:255',
        'personalizacion' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];


}
