<?php

namespace App\Models\Project;

use App\Models\Vendor;
use Eloquent as Model;
use App\Models\Project\ProjectVendor;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProjectTask
 * @package App\Models\Project
 * @version April 27, 2019, 1:19 pm UTC
 *
 * @property integer project_id
 * @property string task_name
 * @property string start_date
 * @property string end_date
 * @property string budget
 */
class ProjectTask extends Model
{
    use SoftDeletes;

    public $table = 'project_tasks';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'project_id',
        'task_name',
        'start_date',
        'end_date',
        'budget'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'project_id' => 'integer',
        'task_name' => 'string',
        'start_date' => 'string',
        'end_date' => 'string',
        'budget' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'project_id' => 'required',
        'task_name' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'budget' => 'required'
    ];

    public function projectVendors()
    {
        return $this->hasMany(ProjectVendor::class);
    }

    public function projectTeams()
    {
        return $this->hasMany(ProjectTeam::class);
    }




    
}
