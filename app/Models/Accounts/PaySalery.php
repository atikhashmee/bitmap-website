<?php

namespace App\Models\Accounts;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


use App\Models\Accounts\Treasures;

/**
 * Class Paysalery
 * @package App\Models\Accounts
 * @version April 8, 2019, 1:10 pm UTC
 *
 * @property string date
 * @property integer treasure_id
 * @property integer user_id
 * @property string payamount
 * @property string token
 */
class Paysalery extends Model
{
    use SoftDeletes;

    public $table = 'paysaleries';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'date',
       
        'employee_id',
        'payamount',
        'tax',
        'loan',
        'token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'string',
        'employee_id' => 'integer',
        'payamount' => 'string',
        'tax' => 'string',
        'loan' => 'string',
        'token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'date' => 'required|date',
        
        'employee_id' => 'required',
        'payamount' => 'required'
    ];


    public function treasure()
    {
        return $this->belongsTo(Treasures::class)->withTrashed();
    }


    public function employees()
    {
        return $this->belongsTo('App\TeamMembers', 'employee_id')->withTrashed();
    }





   




    
   

    
    

    
}
