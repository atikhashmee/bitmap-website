<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesLists extends Model
{
    

    protected $fillable = [
           'list_title',
         'short_description',
               'img'
    ];
}
