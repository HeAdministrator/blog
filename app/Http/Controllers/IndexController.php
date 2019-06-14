<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //列表
    public function index(){
        $articleList = [
            [
                'title'=>'this is title1',
            ],
            [
                'title'=> 'this is title2',
            ],
            [
                'title' => 'this is title3',
            ]
        ];
        return view('article/index',compact('articleList'));
    }
    //详情
    public function getInfo(){
        return view('article/info');
    }
    //新建
    public function create(){
        return view('article/info');
    }
    //编辑
    public function edit(){
        return view('article/info');
    }
    //更新
    public function update(){

    }
    //保存
    public function save(){

    }
    //删除
    public function delete(){

    }
}
