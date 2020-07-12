<?php

namespace App\Models\Accounts;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Accounts\SetupSelery;
/**
 * Class SaleryKeys
 * @package App\Models\Accounts
 * @version April 7, 2019, 12:42 pm UTC
 *
 * @property string key_name
 * @property string description
 */
class SaleryKeys extends Model
{
    use SoftDeletes;

    public $table = 'salery_keys';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'key_name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'key_name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'key_name' => 'required'
    ];



    public function users()
    {
        return $this->belongsToMany('App\TeamMembers', 'selery_setuptable', 'employee_id', 'salery_key_id')->withPivot('amount')->withTrashed();
    }

    
}
