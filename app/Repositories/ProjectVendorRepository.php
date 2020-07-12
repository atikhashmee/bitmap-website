<?php

namespace App\Repositories;

use App\Models\Project\ProjectVendor;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProjectVendorRepository
 * @package App\Repositories
 * @version April 28, 2019, 7:22 am UTC
 *
 * @method ProjectVendor findWithoutFail($id, $columns = ['*'])
 * @method ProjectVendor find($id, $columns = ['*'])
 * @method ProjectVendor first($columns = ['*'])
*/
class ProjectVendorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'project_task_id',
        'vendor_id',
        'project_id',
        'budget',
        'payment_type',
        'extra_requirement'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProjectVendor::class;
    }
}
