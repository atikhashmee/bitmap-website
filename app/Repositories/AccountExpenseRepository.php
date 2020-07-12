<?php

namespace App\Repositories;

use App\Models\Accounts\AccountExpense;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AccountExpenseRepository
 * @package App\Repositories
 * @version May 28, 2019, 8:38 am UTC
 *
 * @method AccountExpense findWithoutFail($id, $columns = ['*'])
 * @method AccountExpense find($id, $columns = ['*'])
 * @method AccountExpense first($columns = ['*'])
*/
class AccountExpenseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date',
        'paid_from_account',
        'amount',
        'expense_category',
        'expense_name',
        'vendor_id',
        'team_id',
        'note'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AccountExpense::class;
    }
}
