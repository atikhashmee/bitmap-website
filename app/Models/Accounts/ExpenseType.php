<?php

namespace App\Models\Accounts;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Accounts\Expenditures;
/**
 * Class ExpenseType
 * @package App\Models\Accounts
 * @version April 6, 2019, 8:13 am UTC
 *
 * @property string expense_name
 * @property string description
 */
class ExpenseType extends Model
{
    use SoftDeletes;

    public $table = 'expense_types';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'expense_name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'expense_name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'expense_name' => 'required'
    ];

    public function expenses()
    {
        return $this->hasMany(Expenditures::class);
    }



    public function projectExpense()
    {
        return $this->hasMany('App\Models\Project\ProjectExpense');
    }

    
}
