<?php

namespace App\Repositories;

use App\Models\Accounts\Expenditures;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ExpendituresRepository
 * @package App\Repositories
 * @version April 7, 2019, 7:22 am UTC
 *
 * @method Expenditures findWithoutFail($id, $columns = ['*'])
 * @method Expenditures find($id, $columns = ['*'])
 * @method Expenditures first($columns = ['*'])
*/
class ExpendituresRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date',
        'account_id',
        'expense_id',
        'is_employee',
        'user_id',
        'amount',
        'description',
        'token'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Expenditures::class;
    }
}
