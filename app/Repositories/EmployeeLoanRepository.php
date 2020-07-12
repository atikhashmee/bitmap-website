<?php

namespace App\Repositories;

use App\Models\Accounts\EmployeeLoan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EmployeeLoanRepository
 * @package App\Repositories
 * @version April 11, 2019, 12:18 pm UTC
 *
 * @method EmployeeLoan findWithoutFail($id, $columns = ['*'])
 * @method EmployeeLoan find($id, $columns = ['*'])
 * @method EmployeeLoan first($columns = ['*'])
*/
class EmployeeLoanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date',
        'employee_id',
        'amount',
        'purpose'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EmployeeLoan::class;
    }
}
