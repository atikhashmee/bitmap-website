<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    

    protected $fillable = [
        'visibilty',
        'image_order',
        'slider_Title',
        'slider_Description',
        'project_url',
        'project_date',
        'image_link'
    ]; 

}
