<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
       /* $name = 'Allen你好';
        return view('post/index')->with('name',$name);*/
       return view('post/index',['title'=>'Allen你好']);
    }
}
