@extends("layout.main")
@section("content")
    <style>
        .layui-table-cell{
            text-align: center;
        }
    </style>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                文章详情页
            </div>
            <form class="layui-form" id="orderForm" novalidate="novalidate" style="width: 80%;background: azure;border: 1px solid #d2d2d2;padding: 3% 0%;display: inline-block;">

                <div class="layui-form-item layui-col-lg12 layui-col-md12">
                    <label class="layui-form-label">标题：</label>
                    <div class="layui-input-block layui-col-lg9 layui-col-md9">
                        <input type="text" name="title"  value="{{$article->title}}" placeholder="请输入标题" autocomplete="off" class="layui-input">
                    </div>
                    <span style="float:left;height: 38px;line-height:38px;margin-left:10px;" id="article_id">{{$article->id}}</span>
                </div>
                <div class="layui-form-item layui-col-lg12 layui-col-md12">
                    <label class="layui-form-label">导语：</label>
                    <div class="layui-input-block layui-col-lg9 layui-col-md9">
                        <textarea name="desc" placeholder="请输入内容" class="layui-textarea">{{$article->introduction}}</textarea>
                    </div>
                </div>

                <div class="layui-form-item layui-col-lg12 layui-col-md12">
                    <label class="layui-form-label">正文：</label>
                    <div class="layui-input-block layui-col-lg9 layui-col-md9">
                        <textarea id="demo" style="display: none;">{{$article->content}}</textarea>
                    </div>
                </div>

                <div class="layui-form-item layui-col-lg12 layui-col-md12">
                    <label class="layui-form-label">创建时间：</label>
                    <div class="layui-input-block layui-col-lg9 layui-col-md9">
                        <input type="text"  value="{{$article->create_time}}" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </form>


        </div>
    </div>
    <script type="text/javascript" src="/theme/H-ui.admin.page3.1.1/lib/jquery/1.9.1/jquery.min.js"></script>
    <script src="/theme/layui-v2.4.5/layui/layui.js"></script>
    <script type="text/javascript">
        layui.use('layedit', function(){
            var layedit = layui.layedit;
            layedit.build('demo'); //建立编辑器
        });
    </script>
@endsection