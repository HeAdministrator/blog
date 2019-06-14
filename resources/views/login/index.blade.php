@extends("layout.main")
@section("content")
    <div class="layadmin-user-login-main">
            <div class="layadmin-user-login-box layadmin-user-login-header">
                <h2>登录</h2>
                <p>欢迎您</p>
            </div>
            <form id="loginForm" class="layui-form" action="/webadmin/login/do_login" method="post">
                <input type="hidden"   name="up_url"  id="LAY-user-login-up_url" value="">
                <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
                    <div class="layui-form-item">
                        <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-username"></label>
                        <input type="text" name="username" id="LAY-user-login-username" lay-verify="required" placeholder="用户名" class="layui-input" value="" >
                    </div>
                    <div class="layui-form-item">
                        <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
                        <input type="password" name="password" id="LAY-user-login-password" lay-verify="required" placeholder="密码" class="layui-input" value="" >
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-row">
                            <div class="layui-col-xs7">
                                <label class="layadmin-user-login-icon layui-icon layui-icon-vercode" for="LAY-user-login-vercode"></label>
                                <input type="text" name="inputRandomCode" id="LAY-user-login-vercode" lay-verify="required" placeholder="图形验证码" class="layui-input">
                            </div>
                            <div class="layui-col-xs5">
                                <div style="margin-left: 10px;">
                                    <img src="/webadmin/login/captcha" class="layadmin-user-login-codeimg" id="imgId"
                                         onclick="javascript:this.src='/webadmin/login/captcha?' + new Date().getTime();">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item" style="margin-bottom: 20px;">
                        <input type="checkbox" checked name="remember" id="remember" lay-skin="primary" title="记住密码">
                        <a href="forget.html" class="layadmin-user-jump-change layadmin-link" style="margin-top: 7px;">忘记密码？</a>
                    </div>
                    <div class="layui-form-item">
                        <button class="layui-btn layui-btn-fluid" id="submitBtn" lay-submit lay-filter="LAY-user-login-submit">登 入</button>
                    </div>
                </div>
            </form>
    </div>
    <script>
        layui.use(['jquery', 'form','layer'], function(){
            var $=layui.$,
                form = layui.form,
                layer = layui.layer;
            var errmsg = '';
            if(errmsg.length>0){
                layer.msg(errmsg, {icon: 5});
            }

            var up_url = document.referrer;
            $("input[name=up_url]").val(up_url);
            //监听提交
            form.on('submit(LAY-user-login-submit)', function(data){
                var strName = $('#LAY-user-login-username').val();
                var strPass = $('#LAY-user-login-password').val();
                localStorage.setItem('keyName',strName);
                if($('#remember').is(':checked')){
                    localStorage.setItem('keyPass',strPass);
                }else{
                    localStorage.removeItem('keyPass');
                }
                $('#loginForm').submit();
                return false;
            });

            //获取url中的参数
            function GetQueryString(name)
            {
                var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
                var r = window.location.search.substr(1).match(reg);
                if(r!=null)return  unescape(r[2]); return null;
            }

            if('Y'== GetQueryString
            ("kick_out")){
                layer.msg('您已经在其他地方登录，请重新登录！');
            }

            $(document).ready(function(){

                var strName = localStorage.getItem('keyName');
                var strPass = localStorage.getItem('keyPass');
                if(strName){
                    $('#LAY-user-login-username').val(strName);
                }if(strPass){
                    $('#LAY-user-login-password').val(strPass);
                }

            });
        });

    </script>
@endsection


