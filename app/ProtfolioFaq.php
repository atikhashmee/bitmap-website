<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProtfolioFaq extends Model
{
    protected $fillable = [
        'protfolios_id',
        'title',
        'description'
    ];
}
