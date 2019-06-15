<?php

namespace App\Http\Controllers;

use App\Article;
use DemeterChain\A;
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
        $map = [];
        $is_="";
        if(isset($_GET['title'])){
            if($_GET['title']){
                $is_= "ok";
                $km=$_GET['title'];
                $km=='' ? :$map[] = ['title','like',"%".$km."%"];

            }
        }
        $start = ($page-1)*$limit; # 计算每页开始位置
        if($is_=="ok"){
            $count = Article::orderBy('id','desc')->where($map)->skip($start)->limit($limit)->count();


            $model = Article::orderBy('id','desc')->where($map)->skip($start)->limit($limit)->get();

        }else{
            $count = Article::orderBy('id','desc')->skip($start)->limit($limit)->count();


            $model = Article::orderBy('id','desc')->skip($start)->limit($limit)->get();
        }

        $data['code'] =0;
        $data['msg'] ='';
        $data['count']=$count;
        $list = $model;
        $list =$list->toArray();
        $data['data'] =$list;
        return $data;
    }
    //详情
    public function getInfo(Article $article){
        return view('article/edit',compact('article'));
    }
    //新建
    public function create(){
        return view('article/info');
    }
    //编辑
    public function edit(){
        return view('article/edit');
    }
    //更新
    public function update(Article $article){
        //验证
        $this->validate(request(),[
            'title'=> 'required|string|max:100|min:5',
            'introduction'=> 'string',
            'content'=> 'string',
        ]);
        $article->title = request('title');
        $article->introduction = request('introduction');
        $article->content = request('content');
        $article->save();
        return redirect("/article/getInfo/{$article->id}");
    }
    //保存
    public function save(){
        //dd(\Request::all());
        //dd(request()->all());
        /*$article = new Article();
        $article->title = request('title');
        $article->introduction = request('introduction');
        $article->content = request('content');
        $article->create_time = now();
        $article->save();
         $article = Article::create(request(['title','introduction','content']));*/
        /*//验证
        $this->validate(request(),[
            'title'=> 'required|string|max:100|min:5',
            'introduction'=> 'string',
            content=> 'string|max:1000',
        ],[
            'title.min' => '文章标题过短',
            'title.max'=>'文章标题过长',
        ]);*/

        //验证
        $this->validate(request(),[
            'title'=> 'required|string|max:100|min:5',
            'introduction'=> 'string',
            'content'=> 'string',
        ]);
        //逻辑
        $params = ['title'=>request('title'),'content'=>request('content'),
                    'introduction'=>request('introduction'),'create_time'=>now(),
                    ];

            $article = Article::create($params);

        //渲染
        //dd($article);
        return redirect('/article');
    }
    //删除
    public function delete(Article $article){
        $article->delete();
        return 'ok';
    }
}
