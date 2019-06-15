@extends("layout.main")
@section("content")
    <div class="layadmin-user-login-main">
            <div class="layadmin-user-login-box layadmin-user-login-header">
                <h2>注册</h2>
                <p>欢迎您</p>
            </div>
            <form id="loginForm" class="layui-form" action="/register/doRegister" method="POST">
                {{csrf_field()}}
                <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
                    <div class="layui-form-item">
                        <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-username"></label>
                        <input type="text" name="name"  placeholder="用户名" class="layui-input" value="" >
                    </div>
                    <div class="layui-form-item">
                        <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
                        <input type="password" name="password"   placeholder="密码" class="layui-input" value="" >
                    </div>
                    <div class="layui-form-item">
                        <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
                        <input type="password" name="password_confirmation" id="LAY-user-login-password" lay-verify="required" placeholder="确认密码" class="layui-input" value="" >
                    </div>
                    {{--<div class="layui-form-item">
                        <div class="layui-row">
                            <div class="layui-col-xs7">
                                <label class="layadmin-user-login-icon layui-icon layui-icon-vercode" for="LAY-user-login-vercode"></label>
                                <input type="text" name="inputRandomCode" id="LAY-user-login-vercode" lay-verify="required" placeholder="图形验证码" class="layui-input">
                            </div>
                            <div class="layui-col-xs5">
                                <div style="margin-left: 10px;">
                                    <img class="verifyImg" onclick="this.src=this.src+'?c='+Math.random();" src="{{url('/login/captcha')}}" />
                                </div>
                            </div>
                        </div>
                    </div>--}}
                    <div class="layui-form-item" style="margin-bottom: 20px;">
                        <input type="checkbox" checked name="is_remember" lay-skin="primary" title="记住密码">
                        <a href="/login" class="layadmin-user-jump-change layadmin-link" style="margin-top: 7px;">登陆</a>
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

                    <div class="layui-form-item">
                        <button class="layui-btn layui-btn-fluid" type="submit" >注册</button>
                    </div>
                </div>
            </form>
    </div>
@endsection


