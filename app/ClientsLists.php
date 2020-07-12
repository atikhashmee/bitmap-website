<?php

namespace App;

use App\Models\Accounts\Income;
use Illuminate\Database\Eloquent\Model;

class ClientsLists extends Model
{
    protected $fillable = [

        'Compnay_name',
        'phone_number',
        'email',
        'address',
        'avater',
        'status'
    ];


    public function incomes()
    {
        return $this->hasMany(Income::class);
    }

    public function proviesMonies(){
        return $this->morphMany(Income::class,'incomefrom');
    }


    public function projects()
    {
        return $this->hasMany('App\Models\Project\Project');
    }

}
