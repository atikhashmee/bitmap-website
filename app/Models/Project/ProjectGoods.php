<?php

namespace App\Models\Project;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProjectGoods
 * @package App\Models\Project
 * @version April 6, 2019, 5:59 am UTC
 *
 * @property integer project_id
 * @property integer user_id
 * @property string date
 * @property string goods_name
 * @property string quantity
 * @property string price
 * @property string reference
 * @property string description
 */
class ProjectGoods extends Model
{
    use SoftDeletes;

    public $table = 'project_goods';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'project_id',
        'user_id',
        'date',
        'goods_name',
        'quantity',
        'price',
        'reference',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'project_id' => 'integer',
        'user_id' => 'integer',
        'date' => 'string',
        'goods_name' => 'string',
        'quantity' => 'string',
        'price' => 'string',
        'reference' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'date' => 'date',
        'goods_name' => 'required'
    ];

    
}
