<?php

namespace App\Models\Project;

use App\TeamMembers;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProjectTeam
 * @package App\Models\Project
 * @version April 28, 2019, 9:56 am UTC
 *
 * @property integer project_id
 * @property integer project_task_id
 * @property integer team_id
 * @property string task_lists
 */
class ProjectTeam extends Model
{
    use SoftDeletes;

    public $table = 'project_teams';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'project_id',
        'project_task_id',
        'team_id',
        'task_lists'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'project_id' => 'integer',
        'project_task_id' => 'integer',
        'team_id' => 'integer',
        'task_lists' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'project_id' => 'required',
        'project_task_id' => 'required',
        'team_id' => 'required'
    ];


    public function teams()
    {
        return $this->belongsTo(TeamMembers::class, 'team_id');
    }

    
}
