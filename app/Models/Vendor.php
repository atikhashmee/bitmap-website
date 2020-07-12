<?php

namespace App\Models;

use Eloquent as Model;
use App\Models\Project\Project;
use App\Models\Project\ProjectVendor;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Vendor
 * @package App\Models
 * @version April 27, 2019, 10:17 am UTC
 *
 * @property integer vendorType_id
 * @property string vendor_name
 * @property string address
 * @property string contact_number
 * @property string email
 * @property string specification
 */
class Vendor extends Model
{
    use SoftDeletes;

    public $table = 'vendors';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'vendor_type_id',
        'vendor_name',
        'address',
        'contact_number',
        'email',
        'specification'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'vendor_type_id' => 'integer',
        'vendor_name' => 'string',
        'address' => 'string',
        'contact_number' => 'string',
        'email' => 'string',
        'specification' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'vendor_type_id' => 'required',
        'vendor_name' => 'required|unique:vendors,vendor_name',
        'email' => 'email'
    ];


    public function vendortype()
    {
        return $this->belongsTo('App\Models\VendorType','vendor_type_id');
    }



    /* public function project()
    {
        return $this->belongsToMany(Project::class, 'project_vendors', 'project_id', 'vendor_id');
    } */

    public function project()
    {
        return $this->hasMany(Project::class, 'project_vendors', 'project_id', 'vendor_id');
    }
    

    
   public function projectvendor()
   {
       return $this->hasMany(ProjectVendor::class);
   }


   public function projectPayment()
   {
       return $this->hasMany('App\Models\Project\VendorPayment');
   }

  


   // new account system start here
   public function vaccountExpense()
   {
       return $this->hasMany('App\Models\Accounts\AccountExpense');
   }




    
}
