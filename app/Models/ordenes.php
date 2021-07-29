<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class ordenes.
 * 'estado',
 * 'users_id'
 * @package App\Models
 * @version May 3, 2021, 8:19 pm UTC
 *
 * @property integer $order_id
 * @property string $status
 * @property string $usuario
 * @property string $nombre
 * @property string $apellido
 * @property string $total_ventas
 * @property string $total_pagado
 */
class ordenes extends Model
{


    public $table = 'ordenes';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';






    public $fillable = [
        'order_id',
        'status',
        'email',
        'nombre',
        'apellido',
        'total_ventas',
        'total_pagado',
        'estado',
        'users_id',
        'country',
        'fecha',
        'billing_phone',
        'shipping_address_1',
        'shipping_address_2',
        'shipping_city',
        'shipping_state',
        'shipping_country',
        'shipping_postcode'



    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'order_id' => 'integer',
        'status' => 'string',
        'email' => 'string',
        'nombre' => 'string',
        'estado' => 'string',
        'apellido' => 'string',
        'total_ventas' => 'string',
        'total_pagado' => 'string',
        'country' => 'string',
        'billing_phone' => 'string',
        'shipping_address_1' => 'string',
        'shipping_address_2' => 'string',
        'shipping_city'  => 'string',
        'shipping_state'  => 'string',
        'shipping_country'  => 'string',
        'shipping_postcode'  => 'string',

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'order_id' => 'nullable|integer',
        'status' => 'nullable|string|max:255',
        'email' => 'nullable|string|max:255',
        'nombre' => 'nullable|string|max:255',
        'apellido' => 'nullable|string|max:255',
        'total_ventas' => 'nullable|string|max:255',
        'total_pagado' => 'nullable|string|max:255',
        'billing_phone' => 'nullable|string|max:255',
        'shipping_address_1' => 'nullable|string|max:255',
        'shipping_address_2' => 'nullable|string|max:255',
        'shipping_city'  => 'nullable|string|max:255',
        'shipping_state'  => 'nullable|string|max:255',
        'shipping_country'  => 'nullable|string|max:255',
        'shipping_postcode'  => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];


}
