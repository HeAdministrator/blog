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
    return view('login/index',['is_show'=>'N']);
});

Route::group(['prefix'=>'login'],function(){
    Route::get('/', '\App\Http\Controllers\IndexController@index');
    Route::get('/captcha', '\App\Http\Controllers\IndexController@captcha');
});




//路由分组
Route::group(['prefix'=>'article'],function(){
    //列表页
    Route::get('/','\App\Http\Controllers\IndexController@index');
    Route::get('/getList','\App\Http\Controllers\IndexController@getList');
    //详情页
    Route::get('/getInfo/{article?}','\App\Http\Controllers\IndexController@getInfo');
    //新建
    Route::get('/create','\App\Http\Controllers\IndexController@create');
    //编辑文章
    Route::get('/edit','\App\Http\Controllers\IndexController@edit');
    //更新
    Route::put("/edit/{article}",'\App\Http\Controllers\IndexController@update');
    //保存
    Route::post("/save",'\App\Http\Controllers\IndexController@save');
    //删除
    Route::get('/delete/{article}','\App\Http\Controllers\IndexController@delete');

});



/*Route::get('/hello','\App\Http\Controllers\AllenController@index');
Route::get('/post','\App\Http\Controllers\postController@index');

Route::match(['get','post'],'multy1',function(){
  return 'multy1';
});

Route::any('multy2',function(){
    return 'multy2';
});

//路由别名
Route::get('user/member-center',['as'=>'center',function(){
    return 'member-center';
}]);*/

/*
 * Route::put('/posts','\APP\Http\Controllers\IndexController@getArticleList');
 <from action="/posts" method="POST">
    <input type="hidden" name="_method" value="PUT"/>
    {{ method_field("PUT") }}
</from>
 */

/*
Route::get('store_index/{name}',function($name){

    return $name.'的商铺商铺';
});


Route::get('user/{name?}',function($name=null){

    return $name;
});*/