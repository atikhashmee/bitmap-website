<?php

namespace App\Models\Project;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class VendorPayment
 * @package App\Models\Project
 * @version April 29, 2019, 9:30 am UTC
 *
 * @property string date
 * @property integer vendor_id
 * @property integer project_id
 * @property string amount
 * @property string remarks
 */
class VendorPayment extends Model
{
    use SoftDeletes;

    public $table = 'vendor_payments';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'date',
        'vendor_id',
        'project_id',
        'amount',
        'remarks'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'string',
        'vendor_id' => 'integer',
        'project_id' => 'integer',
        'amount' => 'string',
        'remarks' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'date' => 'required',
        'vendor_id' => 'required',
        'project_id' => 'required'
    ];

    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor');
    }

    
}
