<?php

namespace App\Repositories;

use App\Models\Products\ProductsLists;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductsListsRepository
 * @package App\Repositories
 * @version May 13, 2019, 9:16 am UTC
 *
 * @method ProductsLists findWithoutFail($id, $columns = ['*'])
 * @method ProductsLists find($id, $columns = ['*'])
 * @method ProductsLists first($columns = ['*'])
*/
class ProductsListsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_name',
        'quantity',
        'unit_id',
        'price',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductsLists::class;
    }
}
