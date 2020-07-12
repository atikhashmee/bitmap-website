<?php

namespace App\Repositories;

use App\Models\Accounts\AccountCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AccountCategoryRepository
 * @package App\Repositories
 * @version May 28, 2019, 4:21 am UTC
 *
 * @method AccountCategory findWithoutFail($id, $columns = ['*'])
 * @method AccountCategory find($id, $columns = ['*'])
 * @method AccountCategory first($columns = ['*'])
*/
class AccountCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'parent',
        'Category',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AccountCategory::class;
    }
}
