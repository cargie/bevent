<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use SoftDeletes;

    protected $dates = ['birth_at', 'deleted_at'];

    protected $fillable = [
    	'first_name', 'last_name', 'gender', 'birth_at',
    	'email', 'phone', 'password', 'profile'
    ];

    public function providers()
    {
    	return $this->morphMany(SocialProvider::class, 'authenticable');
    }

    public function interests()
    {
    	return $this->morphToMany(Category::class, 'categorable');
    }
}
