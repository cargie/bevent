<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Organization
 * @package App\Models
 * @version October 4, 2017, 9:49 am UTC
 *
 * @property string name
 * @property string slug
 * @property string email
 * @property string phone
 * @property string telephone
 * @property string type
 * @property string description
 * @property string website
 */
class Organization extends Model
{
    use SoftDeletes;

    public $table = 'organizations';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'telephone' => 'string',
        'type' => 'string',
        'description' => 'string',
        'website' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'slug' => 'nullable',
        'email' => 'email|required',
        'phone' => 'nullable',
        'telephone' => 'nullable',
        'type' => 'required',
        'description' => 'required',
        'website' => 'url|nullable'
    ];

    
}
