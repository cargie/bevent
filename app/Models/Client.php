<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Client
 * @package App\Models
 * @version October 4, 2017, 9:54 am UTC
 *
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string phone
 * @property timestamp birth_at
 * @property string password
 * @property string remember_token
 * @property string profile
 * @property string gender
 * @property integer organization_id
 */
class Client extends Authenticatable
{
    use SoftDeletes;

    public $table = 'clients';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'password' => 'string',
        'remember_token' => 'string',
        'profile' => 'string',
        'gender' => 'string',
        'organization_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'phone' => 'nullable',
        'birth_at' => 'date|nullable',
        'password' => 'required|min:8',
        'remember_token' => 'nullable',
        'profile' => 'nullable',
        'gender' => 'in:male,female|nullable',
        'organization_id' => 'exists:organizations,id|required'
    ];

    
}
