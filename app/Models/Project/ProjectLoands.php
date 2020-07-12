<?php

namespace App\Models\Project;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProjectLoands
 * @package App\Models\Project
 * @version April 29, 2019, 1:18 pm UTC
 *
 * @property integer project_id
 * @property string from_person_name
 * @property string phone_number
 * @property string email_adrs
 * @property string amount
 * @property string recieved_date
 * @property string payment_date
 * @property string remarks
 */
class ProjectLoands extends Model
{
    use SoftDeletes;

    public $table = 'project_loands';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'project_id',
        'from_person_name',
        'phone_number',
        'email_adrs',
        'amount',
        'recieved_date',
        'payment_date',
        'remarks'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'project_id' => 'integer',
        'from_person_name' => 'string',
        'phone_number' => 'string',
        'email_adrs' => 'string',
        'amount' => 'string',
        'recieved_date' => 'string',
        'payment_date' => 'string',
        'remarks' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'project_id' => 'required',
        'from_person_name' => 'required',
        'amount' => 'required',
        'recieved_date' => 'required'
    ];

    
}
