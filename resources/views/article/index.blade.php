@extends("layout.main")
@section("content")
<style>
    .layui-table-cell{
        text-align: center;
    }
    .layui-table-tool-temp{
        text-align: left;
    }
</style>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                文章列表页
            </div>

           {{-- <div class="links">
                @foreach($article as $article)
                    {{var_dump($article->create_time)}}}
                    <a href="https://laravel.com/docs">{{ $article->title }}<span>创建时间：{{$article->create_time}}</span></a>
                @endforeach


            </div>--}}

            <div class="layui-row " style="width: 80%;display: inline-block;text-align: center">
                <div class="layui-input-inline layui-col-md4" style="float: none;">
                    <input type="text" name="inputTitle" id="inputTitle" autocomplete="off" class="layui-input" placeholder="请输入文章标题">
                </div>
                <div class="layui-col-md1" style="display: inline-block;float: none;">
                    <input type="button" id="searchBtn" class="layui-btn" value="搜索" style="width: 90%; "/>
                </div>
            </div>

            <div id="jfa_table_div" class="layui-row" style="width: 80%;display: inline-block;">
                <table class="layui-hide" id="jfa_table" lay-filter="test"></table>
            </div>
        </div>
    </div>
    <script type="text/html" id="barDemo">
        <a href="/article/create" class="layui-btn" lay-event="edit">新建</a>
    </script>
    <script type="text/javascript" src="/theme/H-ui.admin.page3.1.1/lib/jquery/1.9.1/jquery.min.js"></script>
    <script src="/theme/layui-v2.4.5/layui/layui.js"></script>
    <script type="text/javascript">
        layui.use(['jquery', 'form','table'], function() {
            var table = layui.table, $ = layui.$;
            var form = layui.form, $ = layui.$, laydate = layui.laydate;

            $('#sidebar_leave').addClass('layui-nav-itemed');

            table.render({
                elem: '#jfa_table'
                , url: '/article/getList'
                ,defaultToolbar:[]
                ,toolbar: '#barDemo'
                , cols: [[
                    {field: 'id', width: '5%', title: 'ID'},
                    {
                        field: 'title', width: '70%', title: '标题',
                        templet: function (full) {
                            if (full.status == 8) {
                                return '<a href="' + full.web_url + '/articleInfo/' + full.A_id + '?dc=10" title="' + full.title + '" target="_blank">' + full.title + '</a>';
                            } else {
                                return full.title;
                            }
                        }
                    }
                    , {
                        field: '', width: '10%', title: '操作', templet: function (full) {
                            var str = '<a class="layui-btn layui-btn-xs" href="/article/getInfo/'+full.id+'"><i class="layui-icon"></i></a>';
                            str += '<a href="javascript:void(0);" order_id="' + full.id + '" class="layui-btn layui-btn-danger layui-btn-xs delete"><i class="layui-icon"></i></a>';
                            return str;
                        }
                    }
                    , {field: 'create_time', width: '15%', title: '创建时间'}

                ]]
                , page: true
            });

            $("body").on("click",".delete",function(){

                var order_id = $(this).attr("order_id");
                layer.confirm('确认要删除吗？',function(){
                    $.get("/article/delete/"+order_id+"",function(data){
                        if(data=="ok"){
                            layer.msg("操作成功!",{icon:1});
                            table.reload("jfa_table",{url:'/article/getList'});
                        }else{
                            layer.msg("操作失败",{icon:2});
                        }
                    });
                });
            });

            $("#searchBtn").click(function(){
                var title = $("#inputTitle").val();
                table.reload('jfa_table',{url:'/article/getList',page:{curr: 1},where:{title:title}});
            });
        });
    </script>
@endsection