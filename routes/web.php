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






//路由分组
Route::group(['prefix'=>'article'],function(){
    //列表页
    Route::get('/','\App\Http\Controllers\IndexController@index');
    //详情页
    Route::get('/getInfo/{post}','\App\Http\Controllers\IndexController@getInfo');
    //新建
    Route::get('/create','\APP\Http\Controllers\IndexController@create');
    //编辑文章
    Route::get('/{post}/edit','\APP\Http\Controllers\IndexController@edit');
    //更新
    Route::put("/{post}",'\APP\Http\Controllers\IndexController@update');
    //保存
    Route::post("/",'\APP\Http\Controllers\IndexController@save');
    //删除
    Route::get('/delete','\APP\Http\Controllers\IndexController@delete');

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