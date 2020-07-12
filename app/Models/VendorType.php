<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class VendorType
 * @package App\Models
 * @version April 27, 2019, 10:06 am UTC
 *
 * @property string title
 * @property string details
 */
class VendorType extends Model
{
    use SoftDeletes;

    public $table = 'vendor_types';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'details'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'details' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|unique:vendor_types,title'
    ];

    public function vendors()
    {
        return $this->hasMany('App\Models\Vendor');
    }

    
}
