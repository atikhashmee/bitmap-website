<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProtfolioCategory extends Model
{
     protected $fillable  = [
         'category_name',
         'description'
        ];
}
