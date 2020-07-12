<?php

namespace App\Repositories;

use App\Models\Accounts\Treasures;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TreasuresRepository
 * @package App\Repositories
 * @version April 7, 2019, 6:14 am UTC
 *
 * @method Treasures findWithoutFail($id, $columns = ['*'])
 * @method Treasures find($id, $columns = ['*'])
 * @method Treasures first($columns = ['*'])
*/
class TreasuresRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'account_name',
        'account_number',
        'branch_location',
        'account_type',
        'accoutn_status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Treasures::class;
    }
}
