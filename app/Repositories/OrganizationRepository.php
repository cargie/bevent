<?php

namespace App\Repositories;

use App\Models\Organization;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OrganizationRepository
 * @package App\Repositories
 * @version October 4, 2017, 9:49 am UTC
 *
 * @method Organization findWithoutFail($id, $columns = ['*'])
 * @method Organization find($id, $columns = ['*'])
 * @method Organization first($columns = ['*'])
*/
class OrganizationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'slug',
        'email',
        'phone',
        'telephone',
        'type',
        'description',
        'website'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Organization::class;
    }
}
