<?php

namespace App\Repositories;

use App\Models\Products\ProductUnit;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductUnitRepository
 * @package App\Repositories
 * @version May 13, 2019, 8:18 am UTC
 *
 * @method ProductUnit findWithoutFail($id, $columns = ['*'])
 * @method ProductUnit find($id, $columns = ['*'])
 * @method ProductUnit first($columns = ['*'])
*/
class ProductUnitRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'unit_name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductUnit::class;
    }
}
