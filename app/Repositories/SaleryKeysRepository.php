<?php

namespace App\Repositories;

use App\Models\Accounts\SaleryKeys;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SaleryKeysRepository
 * @package App\Repositories
 * @version April 7, 2019, 12:42 pm UTC
 *
 * @method SaleryKeys findWithoutFail($id, $columns = ['*'])
 * @method SaleryKeys find($id, $columns = ['*'])
 * @method SaleryKeys first($columns = ['*'])
*/
class SaleryKeysRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'key_name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SaleryKeys::class;
    }
}
