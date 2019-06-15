<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;

class LoginController extends Controller
{
    public function index(){
        return view('login/index',['is_show'=>'N']);
    }

    public function captcha(){
        $phrase = new PhraseBuilder;
        $code = $phrase->build(4);
        $builder = new CaptchaBuilder($code, $phrase);
        $builder->setBackgroundColor(255, 255, 255);
        $builder->build(130,40);
        $phrase = $builder->getPhrase();
        Session::flash('code', $phrase); //存储验证码
        return response($builder->output())->header('Content-type','image/jpeg');
    }

    public function  dologin(){

        $this->validate(request(), [
            'name' => 'required',
            'password' => 'required|min:6|max:30',
        ]);

        $user = request(['name', 'password']);
        if (\Auth::attempt($user)) {
            return redirect('/article');
        }

        return \Redirect::back()->withErrors("用户名密码错误");
    }


    public function logout(){
        \Auth::logout();
        return redirect('/login');
    }
}
