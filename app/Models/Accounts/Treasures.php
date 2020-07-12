<?php

namespace App\Models\Accounts;

use Eloquent as Model;
use App\Models\Accounts\Income;
use App\Models\Accounts\Paysalery;

use App\Models\Accounts\Expenditures;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Treasures
 * @package App\Models\Accounts
 * @version April 7, 2019, 6:14 am UTC
 *
 * @property string account_name
 * @property string account_number
 * @property string branch_location
 * @property string account_type
 * @property string accoutn_status
 */
class Treasures extends Model
{
    use SoftDeletes;

    public $table = 'treasures';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'account_name',
        'account_number',
        'branch_location',
        'account_type',
        'accoutn_status',
        'opening_balance'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'account_name' => 'string',
        'account_number' => 'string',
        'branch_location' => 'string',
        'account_type' => 'string',
        'accoutn_status' => 'string',
        'opening_balance' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'account_name' => 'required',
        'account_number' => 'required'
    ];

    public function expenses()
    {
        return $this->hasMany(Expenditures::class);
    }


    public function paysaleries()
    {
        return $this->hasMany(Paysalery::class);
    }


    public function incomes()
    {
        return $this->hasMany(Income::class,'account_id');
    }


    public function employeeloan()
    {
        return $this->hasMany('App\Models\Accounts\EmployeeLoan');
    }

    public function proviesMonies(){
        return $this->morphMany(Income::class,'incomefrom');
    }


    




  

    

    
}
