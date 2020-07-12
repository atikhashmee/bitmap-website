<?php

namespace App\Models\Accounts;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Accounts\Treasures;
use App\Models\Accounts\ExpenseType;
/**
 * Class Expenditures
 * @package App\Models\Accounts
 * @version April 7, 2019, 7:22 am UTC
 *
 * @property string date
 * @property integer account_id
 * @property integer expense_id
 * @property string is_employee
 * @property integer user_id
 * @property string amount
 * @property string description
 * @property string token
 */
class Expenditures extends Model
{
    use SoftDeletes;

    public $table = 'expenditures';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'date',
        'expense_id',
        'is_employee',
        'employee_id',
        'amount',
        'description',
        'token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'string',
        'expense_id' => 'integer',
        'is_employee' => 'string',
        'employee_id' => 'integer',
        'amount' => 'string',
        'description' => 'string',
        'token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'date' => 'date',
        'expense_id' => 'required',
        'is_employee' => 'required',
        'amount' => 'required'
    ];

    public function expenseType()
    {
        return $this->belongsTo(ExpenseType::class, 'expense_id')->withTrashed();
    }

    public function accounts()
    {
        return $this->belongsTo(Treasures::class, 'account_id')->withTrashed();
    }

    

    
}
