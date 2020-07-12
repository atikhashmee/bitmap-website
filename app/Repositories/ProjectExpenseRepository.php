<?php

namespace App\Repositories;

use App\Models\Project\ProjectExpense;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProjectExpenseRepository
 * @package App\Repositories
 * @version April 29, 2019, 8:03 am UTC
 *
 * @method ProjectExpense findWithoutFail($id, $columns = ['*'])
 * @method ProjectExpense find($id, $columns = ['*'])
 * @method ProjectExpense first($columns = ['*'])
*/
class ProjectExpenseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'expense_id',
        'project_id',
        'date',
        'amount',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProjectExpense::class;
    }
}
