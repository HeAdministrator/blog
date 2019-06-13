<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

});

Route::get("send_mail",function(){
    mail('1351242029@qq.com',"测试邮件","这是一封测试邮件");
    return 'send mail';
});


Route::post('user/', function ($user_name,$password) {
    if($password=="123456"){
        return "欢迎您登录: " . $user_name."!!!";
    }else{
        return "密码输入不正确！";
    }

})->name('user.login');

Route::get('user/{id?}', function ($id = 1) {
    return "用户ID: " . $id;
})->name('user.profile');