<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;


class SetupSelery extends Model
{


    public $table = 'selery_setuptable';

    protected $dates = ['deleted_at'];
    

    protected $fillable = [
        'employee_id',
        'salery_key_id',
        'amount'
    ];


    

}
