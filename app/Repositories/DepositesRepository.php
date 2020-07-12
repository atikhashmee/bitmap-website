<?php

namespace App\Repositories;

use App\Models\Accounts\Deposites;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DepositesRepository
 * @package App\Repositories
 * @version May 28, 2019, 7:47 am UTC
 *
 * @method Deposites findWithoutFail($id, $columns = ['*'])
 * @method Deposites find($id, $columns = ['*'])
 * @method Deposites first($columns = ['*'])
*/
class DepositesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date',
        'paid_to_account',
        'amount',
        'category',
        'project_id',
        'deposit_name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Deposites::class;
    }
}
