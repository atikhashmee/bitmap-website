<?php

namespace App\Repositories;

use App\Models\Project\ProjectGoods;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProjectGoodsRepository
 * @package App\Repositories
 * @version April 6, 2019, 5:59 am UTC
 *
 * @method ProjectGoods findWithoutFail($id, $columns = ['*'])
 * @method ProjectGoods find($id, $columns = ['*'])
 * @method ProjectGoods first($columns = ['*'])
*/
class ProjectGoodsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'project_id',
        'user_id',
        'date',
        'goods_name',
        'quantity',
        'price',
        'reference',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProjectGoods::class;
    }
}
