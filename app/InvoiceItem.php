<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $fillable = [ 
        'Item_name',
        'Item_unit',
        'Item_price'
    ];
}
