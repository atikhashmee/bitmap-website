<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    


       protected $fillable = [
           'company_history_title',
           'compnay_history_description',
           'heading',
           'description',
           'about_img',
           'headline_bg',
           'description_bg',
           'youtubelink',
           'image_bg'
        ];

    
}
