<?php

namespace App\Repositories;

use App\Models\Client;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ClientRepository
 * @package App\Repositories
 * @version October 4, 2017, 9:54 am UTC
 *
 * @method Client findWithoutFail($id, $columns = ['*'])
 * @method Client find($id, $columns = ['*'])
 * @method Client first($columns = ['*'])
*/
class ClientRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'birth_at',
        'password',
        'remember_token',
        'profile',
        'gender',
        'organization_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Client::class;
    }
}
