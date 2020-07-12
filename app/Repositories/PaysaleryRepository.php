<?php

namespace App\Repositories;

use App\Models\Accounts\Paysalery;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PaysaleryRepository
 * @package App\Repositories
 * @version April 8, 2019, 1:10 pm UTC
 *
 * @method Paysalery findWithoutFail($id, $columns = ['*'])
 * @method Paysalery find($id, $columns = ['*'])
 * @method Paysalery first($columns = ['*'])
*/
class PaysaleryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date',
        'treasure_id',
        'user_id',
        'payamount',
        'token'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Paysalery::class;
    }

    
}
