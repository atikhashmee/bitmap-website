<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TeamMembers;
class TeamType extends Model
{
      protected $fillable = ["category_title","description"];

      

     public function members(){
           return $this->hasMany(TeamMembers::class,'team_types_id');
     }
}
