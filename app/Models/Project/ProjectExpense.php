<?php

namespace App\Models\Project;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProjectExpense
 * @package App\Models\Project
 * @version April 29, 2019, 8:03 am UTC
 *
 * @property integer expense_id
 * @property integer project_id
 * @property string date
 * @property string amount
 * @property string description
 */
class ProjectExpense extends Model
{
    use SoftDeletes;

    public $table = 'project_expenses';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'expense_id',
        'project_id',
        'date',
        'amount',
        'description',
        'carrier'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'expense_id' => 'integer',
        'project_id' => 'integer',
        'date' => 'string',
        'amount' => 'string',
        'description' => 'string',
        'carrier' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'expense_id' => 'required',
        'project_id' => 'required',
        'date' => 'required|date'
    ];


    public function expense()
    {
        return $this->belongsTo('App\Models\Accounts\ExpenseType');
    }

    
}
