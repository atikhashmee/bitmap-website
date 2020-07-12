<?php

namespace App\Models\Accounts;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Deposites
 * @package App\Models\Accounts
 * @version May 28, 2019, 7:47 am UTC
 *
 * @property string date
 * @property string paid_to_account
 * @property string amount
 * @property string category
 * @property integer project_id
 * @property string deposit_name
 * @property string description
 */
class Deposites extends Model
{
    use SoftDeletes;

    public $table = 'deposites';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'date',
        'paid_to_account',
        'amount',
        'category',
        'project_id',
        'deposit_name',
        'user_id',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'string',
        'paid_to_account' => 'string',
        'amount' => 'string',
        'category' => 'string',
        'project_id' => 'integer',
        'user_id' => 'integer',
        'deposit_name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'date' => 'required',
        'paid_to_account' => 'required',
        'amount' => 'required',
        'category' => 'required'
    ];


    public function paidtoaccount()
    {
        return $this->belongsTo('App\Models\Accounts\AccountCategory', 'paid_to_account');
    }

    public function accountCategory()
    {
        return $this->belongsTo('App\Models\Accounts\AccountCategory', 'category');
    }


    

    
}
