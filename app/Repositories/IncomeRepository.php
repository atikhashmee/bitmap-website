<?php

namespace App\Repositories;

use App\Models\Accounts\Income;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class IncomeRepository
 * @package App\Repositories
 * @version April 9, 2019, 7:47 am UTC
 *
 * @method Income findWithoutFail($id, $columns = ['*'])
 * @method Income find($id, $columns = ['*'])
 * @method Income first($columns = ['*'])
*/
class IncomeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date',
        'account_id',
        'client_id',
        'project_id',
        'amount',
        'description',
        'carrier',
        'token'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Income::class;
    }
}
