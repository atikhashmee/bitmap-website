<?php

namespace App\Repositories;

use App\Models\Project\ProjectLoanPayment;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProjectLoanPaymentRepository
 * @package App\Repositories
 * @version April 29, 2019, 1:50 pm UTC
 *
 * @method ProjectLoanPayment findWithoutFail($id, $columns = ['*'])
 * @method ProjectLoanPayment find($id, $columns = ['*'])
 * @method ProjectLoanPayment first($columns = ['*'])
*/
class ProjectLoanPaymentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'loans_id',
        'date',
        'amount',
        'remarks'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProjectLoanPayment::class;
    }
}
