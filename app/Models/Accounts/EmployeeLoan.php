<?php

namespace App\Models\Accounts;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EmployeeLoan
 * @package App\Models\Accounts
 * @version April 11, 2019, 12:18 pm UTC
 *
 * @property string date
 * @property integer employee_id
 * @property string amount
 * @property string purpose
 */
class EmployeeLoan extends Model
{
    use SoftDeletes;

    public $table = 'employee_loans';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'date',
        'employee_id',
        'amount',
        'purpose'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'string',
        'employee_id' => 'integer',
        'amount' => 'string',
        'purpose' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'date' => 'required|date',
        'employee_id' => 'required',
        'amount' => 'required'
    ];


    public function employee()
    {
        return $this->belongsTo('App\TeamMembers', 'employee_id');
    }

    public function accounts()
    {
        return $this->belongsTo('App\Models\Accounts\Treasures', 'account_id');
    }


    

    
}
