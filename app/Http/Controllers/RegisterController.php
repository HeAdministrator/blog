<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;

class RegisterController extends Controller
{
    public function index(){
        return view('register/index');
    }


    public function  doRegister(){
        $this->validate(request(),[
            'name' => 'required|min:3|unique:t_rbac_user,name',
            'password' => 'required|min:5|confirmed',
        ]);

        $password = bcrypt(request('password'));
        $name = request('name');
        $user = \App\User::create(compact('name', 'password'));
        return redirect('/login');
    }

}
