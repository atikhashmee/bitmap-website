<?php

namespace App\Repositories;

use App\Models\Project\VendorPayment;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VendorPaymentRepository
 * @package App\Repositories
 * @version April 29, 2019, 9:30 am UTC
 *
 * @method VendorPayment findWithoutFail($id, $columns = ['*'])
 * @method VendorPayment find($id, $columns = ['*'])
 * @method VendorPayment first($columns = ['*'])
*/
class VendorPaymentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date',
        'vendor_id',
        'project_id',
        'amount',
        'remarks'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return VendorPayment::class;
    }
}
