<?php

namespace App\Models\Project;

use App\Models\Vendor;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProjectVendor
 * @package App\Models\Project
 * @version April 28, 2019, 7:22 am UTC
 *
 * @property integer project_task_id
 * @property integer vendor_id
 * @property integer project_id
 * @property string budget
 * @property string payment_type
 * @property string extra_requirement
 */
class ProjectVendor extends Model
{
    use SoftDeletes;

    public $table = 'project_vendors';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'project_task_id',
        'vendor_id',
        'project_id',
        'budget',
        'payment_type',
        'extra_requirement'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'project_task_id' => 'integer',
        'vendor_id' => 'integer',
        'project_id' => 'integer',
        'budget' => 'string',
        'payment_type' => 'string',
        'extra_requirement' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'project_task_id' => 'required',
        'vendor_id' => 'required',
        'project_id' => 'required',
        'payment_type' => 'required'
    ];

    public function vendors()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    
}
