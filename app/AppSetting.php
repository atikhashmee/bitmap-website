<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    protected $fillable = [
          'logo',
          'fevicon',
          'title',
          'short_description',
          'address',
          'phone',
          'email',
          'facebook',
          'twitter',
          'instagram'
    ];
}
