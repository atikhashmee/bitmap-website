<?php

namespace App\Models\Accounts;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

/**
 * Class AccountCategory
 * @package App\Models\Accounts
 * @version May 28, 2019, 4:21 am UTC
 *
 * @property string parent
 * @property string Category
 * @property string description
 */
class AccountCategory extends Model
{
    use SoftDeletes; use NodeTrait;


    public $table = 'account_categories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'parent_id',
        'Category',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'parent_id' => 'string',
        'Category' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Category' => 'required'
    ];


 

    

    
}
