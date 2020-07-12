<?php

namespace App\Repositories;

use App\Models\Project\ProjectTeam;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProjectTeamRepository
 * @package App\Repositories
 * @version April 28, 2019, 9:56 am UTC
 *
 * @method ProjectTeam findWithoutFail($id, $columns = ['*'])
 * @method ProjectTeam find($id, $columns = ['*'])
 * @method ProjectTeam first($columns = ['*'])
*/
class ProjectTeamRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'project_id',
        'project_task_id',
        'team_id',
        'task_lists'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProjectTeam::class;
    }
}
