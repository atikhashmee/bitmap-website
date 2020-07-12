<?php

namespace App;

use App\Models\Project\ProjectTeam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamMembers extends Model
{
    use SoftDeletes;

    public $table = 'team_members';
    

    protected $dates = ['deleted_at'];


    protected $fillable = [
        "team_types_id",
        "employee_status",
        "visibility",
        "member_name",
        "designation",
        "description",
        "email",
        "linkedin",
        "twitter",
        "instagram",
        "memberimage"
    ];



      //team type relattion

      public function types()
      {
          return $this->belongsTo('App\TeamType','team_types_id');
      }


    public function salerykeys()
     {
         return $this->belongsToMany('App\Models\Accounts\SaleryKeys', 'selery_setuptable', 'employee_id', 'salery_key_id')
         ->withPivot('amount');
     }


     public function get_salery_from()
     {
         return $this->belongsToMany('App\Models\Accounts\Treasures', 'paysaleries', 'employee_id', 'treasure_id');
     }

     public function loans()
     {
         return $this->hasMany('App\Models\Accounts\EmployeeLoan','employee_id');
     }

     public function saleryPayment()
     {
         return $this->hasMany('App\Models\Accounts\Paysalery','employee_id');
     }

     public function saleryMonthAmount()
     {
         return $this->hasMany('App\Models\Accounts\Paysalery','employee_id')->whereYear('paysaleries.date',date('Y'))->whereMonth('paysaleries.date',date('m'));
     }


     public function projectteams()
     {
       return $this->hasMany(ProjectTeam::class);
     }





   //final touch to accounting system
     public function accountExpense()
     {
         return $this->hasMany('App\Models\Accounts\AccountExpense');
     }
    
     


    


     
     
    
     
     

    
}
