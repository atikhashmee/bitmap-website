<?php

namespace App\Repositories;

use App\Models\Project\Project;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProjectRepository
 * @package App\Repositories
 * @version April 3, 2019, 9:18 am UTC
 *
 * @method Project findWithoutFail($id, $columns = ['*'])
 * @method Project find($id, $columns = ['*'])
 * @method Project first($columns = ['*'])
*/
class ProjectRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'project_title',
        'client_name',
        'location',
        'contact_number',
        'status',
        'budget'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Project::class;
    }
}
