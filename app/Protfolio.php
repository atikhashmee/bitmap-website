<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Protfolio extends Model
{
    private $img_file = "project_cover_photo";
    protected $fillable = [
          'protfolio_categories_id',
          'project_title',
          'about_project',
          'description_project',
          'date',
          'client_name',
          'project_location',
          'video_url',
          'video_description',
          'project_cover_photo'
    ];


    public function delete(){
       
         if ( file_exists($this->img_file) ) {
            Storage::disk("public")->delete($this->img_file);
         }
         parent::delete();
    }
}
