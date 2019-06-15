<?php

namespace App\Http\Controllers;

use App\Article;
use function Sodium\add;

class IndexController extends Controller
{
    //列表
    public function index(){
        $article = Article::orderBy('id','desc')->paginate(6);

        return view('article/index',compact('article'));
    }

    public function getList(){

        if ($_GET['page']) { //获取当前页码
            $page = $_GET['page'];
        }else{
            $page = 1;
        }
        if ($_GET['limit']) { //获取当前页码
            $limit = $_GET['limit'];
        }else{
            $limit = 1;
        }

        $count = Article::orderBy('id','desc')->count();
        $start = ($page-1)*$limit; # 计算每页开始位置

        $model = Article::orderBy('id','desc')->skip($start)->limit($limit)->get();
        $data['code'] =0;
        $data['msg'] ='';
        $data['count']=$count;
        $list = $model;
        $list =$list->toArray();
        $data['data'] =$list;
        return $data;
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
