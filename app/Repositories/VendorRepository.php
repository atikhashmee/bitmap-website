<?php

namespace App\Repositories;

use App\Models\Vendor;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VendorRepository
 * @package App\Repositories
 * @version April 27, 2019, 10:17 am UTC
 *
 * @method Vendor findWithoutFail($id, $columns = ['*'])
 * @method Vendor find($id, $columns = ['*'])
 * @method Vendor first($columns = ['*'])
*/
class VendorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'vendorType_id',
        'vendor_name',
        'address',
        'contact_number',
        'email',
        'specification'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Vendor::class;
    }
}
