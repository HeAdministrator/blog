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
            <form action = "/article/edit/{{$article->id}}" method="POST" class="layui-form" id="orderForm"  style="width: 80%;background: azure;border: 1px solid #d2d2d2;padding: 3% 0%;display: inline-block;">
                {{method_field("PUT")}}
                {{csrf_field()}}
                <div class="layui-form-item layui-col-lg12 layui-col-md12">
                    <label class="layui-form-label">标题：</label>
                    <div class="layui-input-block layui-col-lg9 layui-col-md9">
                        <input type="text" name="title"  value="{{isset($article->title)?$article->title:''}}" placeholder="请输入标题" autocomplete="off" class="layui-input">
                    </div>
                    <span style="float:left;height: 38px;line-height:38px;margin-left:10px;" id="article_id">{{isset($article->id)?$article->id:''}}</span>
                </div>
                <div class="layui-form-item layui-col-lg12 layui-col-md12">
                    <label class="layui-form-label">导语：</label>
                    <div class="layui-input-block layui-col-lg9 layui-col-md9">
                        <textarea name="introduction" placeholder="请输入内容" class="layui-textarea">{{isset($article->introduction)?$article->introduction:''}}</textarea>
                    </div>
                </div>

                <div class="layui-form-item layui-col-lg12 layui-col-md12">
                    <label class="layui-form-label">正文：</label>
                    <div class="layui-input-block layui-col-lg9 layui-col-md9">
                        <textarea id="demo" name="content" style="display: none;">{{isset($article->content)?$article->content:''}}</textarea>
                    </div>
                </div>

                <div class="layui-form-item layui-col-lg12 layui-col-md12">
                    <label class="layui-form-label">创建时间：</label>
                    <div class="layui-input-block layui-col-lg9 layui-col-md9">
                        <input type="text" disabled value="{{isset($article->create_time)?$article->create_time:''}}" autocomplete="off" class="layui-input layui-btn-disabled">
                    </div>
                </div>

                @if(count($errors)>0)
                <div class="layui-form-item layui-col-lg12 layui-col-md12">
                    <fieldset class="layui-elem-field layui-field-title" style="color: #FF5722;">
                        <legend>错误信息</legend>
                    </fieldset>
                    <blockquote class="layui-elem-quote layui-quote-nm">
                        @foreach($errors->all() as $error)
                            <span class="layui-badge">{{$error}}</span><br>
                        @endforeach
                    </blockquote>

                </div>
                @endif
                <div class="layui-form-item layui-col-lg12 layui-col-md12">
                        <button class="layui-btn" type="submit" lay-submit lay-filter="saveBtn">提交</button>
                        <a class="layui-btn layui-btn-primary" href="/article">返回</a>
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