<?php

namespace App\Models\Products;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductsLists
 * @package App\Models\Products
 * @version May 13, 2019, 9:16 am UTC
 *
 * @property string product_name
 * @property string quantity
 * @property integer unit_id
 * @property string price
 * @property string description
 */
class ProductsLists extends Model
{
    use SoftDeletes;

    public $table = 'products_lists';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'product_name',
        'quantity',
        'unit_id',
        'category_id',
        'price',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'product_name' => 'string',
        'quantity' => 'string',
        'unit_id' => 'integer',
        'category_id' => 'integer',
        'price' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_name' => 'required',
        'unit_id' => 'required',
        'category_id' => 'required',
        'price' => 'required'
    ];



    public function productcategory()
    {
        return $this->belongsTo('App\Models\Products\ProductCategory', 'category_id');
    }

   public function units()
   {
       return $this->belongsTo('App\Models\Products\ProductUnit', 'unit_id');
   }

    
}
