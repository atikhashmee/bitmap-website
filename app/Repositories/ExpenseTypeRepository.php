<?php

namespace App\Repositories;

use App\Models\Accounts\ExpenseType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ExpenseTypeRepository
 * @package App\Repositories
 * @version April 6, 2019, 8:13 am UTC
 *
 * @method ExpenseType findWithoutFail($id, $columns = ['*'])
 * @method ExpenseType find($id, $columns = ['*'])
 * @method ExpenseType first($columns = ['*'])
*/
class ExpenseTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'expense_name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ExpenseType::class;
    }
}
