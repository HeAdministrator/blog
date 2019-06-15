<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    public $timestamps = false;
    protected  $guarded= [];//不可以注入数据字段
    //protected  $fillable=['title','introduction','content','create_time'];//可以注入数据字段
}
