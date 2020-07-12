<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
            'client_name',
            'client_image',
            'client_comment',
            'signature',
            'comment_via'
    ];
}
