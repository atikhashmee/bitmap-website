<?php

namespace App\Models\Products;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductCategory
 * @package App\Models\Products
 * @version May 13, 2019, 8:41 am UTC
 *
 * @property string cat_name
 * @property string description
 */
class ProductCategory extends Model
{
    use SoftDeletes;

    public $table = 'product_categories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'cat_name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cat_name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cat_name' => 'required'
    ];


    public function productslist()
    {
        return $this->hasMany('App\Models\Products\ProductsLists');
    }

    
}
