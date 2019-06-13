<style>
     button{
         width: 133px;
         height: 33px;
         font-weight: bold;
         color: blanchedalmond;
         font-size: 16px;
         background-color: #999;
         border: 1px solid #000;
         border-radius: 10px;

     }
    h2{
        width: 150px;
        text-align: right;
    }
</style>
<div style="width: 100%;">
    <div style="width: 100%;text-align: center;">
        <h1>登录</h1>
    </div>
        <from action="{{ route('user.login',['user_name'=>'allen','password'=>'123456']) }}" method="post">
            <div style="text-align: center;">
                <h2 style="display: inline-block;">用户名：</h2><input  type="text" name="user_name">
            </div>
            <div style="text-align: center;">
                <h2 style="display: inline-block;">密码：</h2><input  type="password" name="password">
            </div>
            <div style="text-align: center;margin-top: 32px;margin-left: 125px;">
                <button type="submit" name="submit">提交</button>
            </div>
        </from>
    <a href="{{ route('user.profile', [100]) }}">点击</a>
</div>

<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
