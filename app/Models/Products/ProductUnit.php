<?php

namespace App\Models\Products;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductUnit
 * @package App\Models\Products
 * @version May 13, 2019, 8:18 am UTC
 *
 * @property string unit_name
 */
class ProductUnit extends Model
{
    use SoftDeletes;

    public $table = 'product_units';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'unit_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'unit_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'unit_name' => 'required'
    ];

    public function products()
    {
        return $this->hasMany('App\Models\Products\ProductsLists');
    }

    
}
