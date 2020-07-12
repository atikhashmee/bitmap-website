<?php

namespace App\Repositories;

use App\Models\Project\ProjectTask;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProjectTaskRepository
 * @package App\Repositories
 * @version April 27, 2019, 1:19 pm UTC
 *
 * @method ProjectTask findWithoutFail($id, $columns = ['*'])
 * @method ProjectTask find($id, $columns = ['*'])
 * @method ProjectTask first($columns = ['*'])
*/
class ProjectTaskRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'project_id',
        'task_name',
        'start_date',
        'end_date',
        'budget'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProjectTask::class;
    }
}
