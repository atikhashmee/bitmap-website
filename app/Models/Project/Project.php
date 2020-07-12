<?php

namespace App\Models\Project;

use App\Models\Vendor;
use Eloquent as Model;


use App\Models\Accounts\Income;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Project
 * @package App\Models\Project
 * @version April 3, 2019, 9:18 am UTC
 *
 * @property string project_title
 * @property string client_name
 * @property string location
 * @property string contact_number
 * @property string status
 * @property string budget
 */
class Project extends Model
{
    use SoftDeletes;

    public $table = 'projects';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'project_title',
        'client_id',
        'location',
        'contact_number',
        'status',
        'budget',
        'project_budget_status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'project_title' => 'string',
        'client_id' => 'integer',
        'location' => 'string',
        'contact_number' => 'string',
        'status' => 'string',
        'budget' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'project_title' => 'required',
        'client_id' => 'required'
    ];


   


    public function proviesMonies(){
        return $this->morphMany(Income::class,'incomefrom');
    }




    /* public function vendor()
    {
        return $this->hasMany(Vendor::class, 'project_vendors', 'project_id','vendor_id');
    } */

    public function vendor()
    {
        return $this->belongsToMany(Vendor::class, 'project_vendors', 'project_id','vendor_id');
    }




    public function client()
    {
        return $this->belongsTo('App\ClientsLists', 'client_id');
    }


   

    

   // new account system start here
   public function paccountExpense()
   {
       return $this->hasMany('App\Models\Accounts\AccountExpense');
   }

    
}
