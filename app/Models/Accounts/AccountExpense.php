<?php

namespace App\Models\Accounts;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
/**
 * Class AccountExpense
 * @package App\Models\Accounts
 * @version May 28, 2019, 8:38 am UTC
 *
 * @property string date
 * @property string paid_from_account
 * @property string amount
 * @property string expense_category
 * @property string expense_name
 * @property integer vendor_id
 * @property integer team_id
 * @property string note
 */
class AccountExpense extends Model
{
    use SoftDeletes;

    public $table = 'account_expenses';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'date',
        'paid_from_account',
        'amount',
        'expense_category',
        'expense_name',
        'vendor_id',
        'project_id',
        'team_id',
        'user_id',
        'note'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'string',
        'paid_from_account' => 'string',
        'amount' => 'string',
        'expense_category' => 'string',
        'expense_name' => 'string',
        'vendor_id' => 'integer',
        'team_id' => 'integer',
        'user_id' => 'integer',
        'project_id' => 'integer',
        'note' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'date' => 'required',
        'paid_from_account' => 'required',
        'user_id' => 'required',
        'amount' => 'required',
        'expense_category' => 'required'
    ];
    

    /* 
    
      Category relationship start here
    */

    public function paidFromAccount()
    {
        return $this->belongsTo('App\Models\Accounts\AccountCategory', 'paid_from_account');
    }

    public function expensecategory()
    {
        return $this->belongsTo('App\Models\Accounts\AccountCategory', 'expense_category');
    }

     /* 
    
      Category relationship end here
    */






    /* 
       personell relationship start here
    
    */

    public function projects()
    {
        return $this->belongsTo('App\Models\Project\Project', 'project_id');
    }

     
    public function vendors()
    {
        return $this->belongsTo('App\Models\Vendor', 'vendor_id');
    }


    public function teams()
    {
        return $this->belongsTo('App\TeamMembers', 'team_id');
    }






 

     //mutator
    /* public function getFromDateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d-M-Y');
    } */












   


    
}
