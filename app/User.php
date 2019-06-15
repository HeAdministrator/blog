<?php

namespace App;

use App\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    public $timestamps = false;
    protected  $table = 't_rbac_user';
    protected $fillable=[
        'name','password'
    ];
}
