<?php

namespace App\Repositories;

use App\Models\Project\ProjectLoands;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProjectLoandsRepository
 * @package App\Repositories
 * @version April 29, 2019, 1:18 pm UTC
 *
 * @method ProjectLoands findWithoutFail($id, $columns = ['*'])
 * @method ProjectLoands find($id, $columns = ['*'])
 * @method ProjectLoands first($columns = ['*'])
*/
class ProjectLoandsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'project_id',
        'from_person_name',
        'phone_number',
        'email_adrs',
        'amount',
        'recieved_date',
        'payment_date',
        'remarks'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProjectLoands::class;
    }
}
