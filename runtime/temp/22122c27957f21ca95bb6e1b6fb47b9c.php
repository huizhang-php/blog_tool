<?php /*a:1:{s:80:"/Users/guoyuzhao/sites/tuzisir-tool/application/admin/view/login/login_view.html";i:1539347254;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" type="text/css" href="/static/admin/css/index.css"/>
    <script src="/static/common/js/jquery.min.js" ></script>
    <script src="/static/common/layui/layui.all.js"></script>
    <script src="/static/common/js/my.layui.pack.js"></script>
    <link href="/static/common/layui/css/layui.css" rel="stylesheet">
</head>
<style>
    input:-webkit-autofill { box-shadow: 0 0 0px 1000px white inset;}
</style>
<body>
<div class="bg1"></div>
<div class="gyl">
    Tuzisir   Tool!
    <div class="gy2" > -- 不求前途凶吉，但求落幕无悔。 </div>
</div>
<form class="layui-form" action="">
    <div class="bg">
        <div class="wel">用户登录</div>
        <div class="user">
            <div id="yonghu" style="">用户名</div>
            <input lay-verify="required" type="text" id="admin-name" placeholder="请输入6-15位账号" autocomplete="off" name="admin_name" />
        </div>
        <div class="password" >
            <div id="yonghu" >密&nbsp;&nbsp;&nbsp;码</div>
            <input lay-verify="required" class="" id="admin-password" autocomplete="off" type="password" placeholder="请输入6-15位密码" name="admin_password" />
        </div>
        <!--<div class="verify" >-->
            <!--<div id="yonghu" >验证码</div>-->
            <!--<input lay-verify="required" class="" id="admin-verify" type="text" name="admin_verify" />-->
        <!--</div>-->
        <!--<div class="rem" >-->
        <!--<input type="checkbox" name="" id="" value="" />-->
        <!--<div id="reb">-->
        <!--记住密码-->
        <!--</div>-->
        <!--</div>-->
        <div class="fg" >
            <div style="font-size: 11px;margin-top: 11px;">
                <!--<a style="font-size: 11px;" href="#">忘记密码？</a>-->
            </div>
        </div>
        <span class="layui-btn btn" lay-submit="" lay-filter="login-btn">登录</span>
    </div>
</form>
</body>
</html>
<script>
    var form;
    layui.use(['form', 'layedit', 'laydate'], function() {
        form = layui.form
    });
    //监听提交
    form.on('submit(login-btn)', function(data){
        var params = data.field;
        // 验证参数
        var checkParamsResult = checkParams(params);
        if (checkParamsResult !== true) return tipMsg(400, checkParamsResult);
        // 验证账号密码
        var checkLogin = login(params);
        return false;
    });

    // 验证参数
    function checkParams(params) {
        if (params.admin_name.length < 6) {
            return '账号不能小于6位';
        }
        if (params.admin_password < 6) {
            return '密码不能小于6位';
        }
        return true;
    }
    
    // 验证账号密码
    function login(params) {
        curlAjax("check_login", params, 'commonReturn');
    }

    // 公共返回
    function commonReturn(data) {
        tipMsg(data.code, data.msg)
        if (data.code === 200) {
            window.location.href="<?php echo url('index/index'); ?>";
        }
    }

</script>
