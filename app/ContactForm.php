<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    protected $fillable = [
        'contact_heading',
        'little_description',
        'email',
        'cell',
        'website',
        'address',
        'go_location',
        'note_on_go_location',
        'contact_image'
    ];
}
