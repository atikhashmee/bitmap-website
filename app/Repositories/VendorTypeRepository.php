<?php

namespace App\Repositories;

use App\Models\VendorType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VendorTypeRepository
 * @package App\Repositories
 * @version April 27, 2019, 10:06 am UTC
 *
 * @method VendorType findWithoutFail($id, $columns = ['*'])
 * @method VendorType find($id, $columns = ['*'])
 * @method VendorType first($columns = ['*'])
*/
class VendorTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'details'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return VendorType::class;
    }
}
