<?php

namespace App\Models\Project;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProjectLoanPayment
 * @package App\Models\Project
 * @version April 29, 2019, 1:50 pm UTC
 *
 * @property integer loans_id
 * @property string date
 * @property string amount
 * @property string remarks
 */
class ProjectLoanPayment extends Model
{
    use SoftDeletes;

    public $table = 'project_loan_payments';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'loans_id',
        'project_id',
        'date',
        'amount',
        'remarks'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'loans_id' => 'integer',
        'project_id' => 'integer',
        'date' => 'string',
        'amount' => 'string',
        'remarks' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'loans_id' => 'required',
        'project_id' => 'required',
        'date' => 'required',
        'amount' => 'required'
    ];

    
}
