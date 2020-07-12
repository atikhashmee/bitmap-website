<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProtfolioBg extends Model
{
    protected $fillable =  [
        'bg_title',
        'bg_description',
        'bg_image'
    ];
}
