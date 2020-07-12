<?php

namespace App\Models\Accounts;

use App\ClientsLists;
use Eloquent as Model;
use App\Models\Accounts\Treasures;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Income
 * @package App\Models\Accounts
 * @version April 9, 2019, 7:47 am UTC
 *
 * @property string date
 * @property integer account_id
 * @property integer client_id
 * @property integer project_id
 * @property string amount
 * @property string description
 * @property string carrier
 * @property string token
 */
class Income extends Model
{
    use SoftDeletes;

    public $table = 'incomes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
        'date' => 'required|date',
        'amount' => 'required'
    ];

    public function accounts()
    {
        return $this->belongsTo(Treasures::class,'account_id');
    }
    

    public function clients()
    {
        return $this->belongsTo(ClientsLists::class,'client_id');
    }


    public function incomefrom(){
        return $this->morphTo();
    }

    

    

   

    

    
}
