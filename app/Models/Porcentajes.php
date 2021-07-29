<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Porcentajes
 * @package App\Models
 * @version May 12, 2021, 5:17 pm UTC
 *
 * @property integer $product_id
 * @property string $porcentaje
 */
class Porcentajes extends Model
{
    use SoftDeletes;

    public $table = 'porcentajes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'product_id',
        'porcentaje'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'porcentaje' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_id' => 'nullable|integer',
        'porcentaje' => 'nullable|string|max:255'
    ];

    
}
