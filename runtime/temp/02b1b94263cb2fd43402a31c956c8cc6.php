<?php /*a:2:{s:71:"/Users/guoyuzhao/sites/tuzitest/application/admin/view/index/index.html";i:1539233014;s:73:"/Users/guoyuzhao/sites/tuzitest/application/admin/view/common/header.html";i:1539250433;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tuzisir Tool!</title>
    <meta name="keywords" content="tuzisir" />
    <meta name="description" content="tuzisir" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <script src="/tuzitest/public/static/common/js/jquery.min.js" ></script>
    <script src="/tuzitest/public/static/common/layui/layui.all.js"></script>
    <link href="/tuzitest/public/static/common/layui/css/layui.css" rel="stylesheet">
    <link href="/tuzitest/public/static/common/css/tuzisir.css" rel="stylesheet">
    <script src="/tuzitest/public/static/common/js/my.layui.pack.js"></script>
</head>
<body>

<div class="layui-layout-admin">
    <!--头部-->
    <div class="layui-header">
        <div class="layui-logo">Tuzisir Tool!</div>
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item">
                <a href="javascript:;">其他系统</a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;">邮件管理</a></dd>
                    <dd><a href="javascript:;">消息管理</a></dd>
                    <dd><a href="javascript:;">授权管理</a></dd>
                </dl>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href=""><img src="http://m.zhengjinfan.cn/images/0.jpg" class="layui-nav-img"><?php echo htmlentities(app('request')->session('admin_name')); ?> </a>
                <dl class="layui-nav-child">
                    <dd><a href="<?php echo url('/admin/login/unlogin'); ?>">退出登录</a></dd>
                </dl>
            </li>
        </ul>
    </div>

    <!--左侧-->
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <ul class="layui-nav layui-nav-tree" lay-filter="left-nav">
                <li class="layui-nav-item">
                    <a href="javascript:;">用户管理</a>
                    <dl class="layui-nav-child location">
                        <dd><a href="#" class="location" data-url="http://www.souhu.com">用户列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">Tool 管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="#" class="location" data-url="<?php echo url('/admin/tool/index'); ?>">Tool 列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">广告管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="">左右侧广告位</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">权限管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="">功能列表</a></dd>
                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="">角色列表</a></dd>
                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="">管理员列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="">产品</a></li>
                <li class="layui-nav-item"><a href="">大数据</a></li>
            </ul>
        </div>
    </div>
    <!--中间主体-->
    <div class="layui-body" id="container">
        <iframe id="container-iframe" src="" style="height:100%;width: 100%;" frameborder="0"></iframe>
    </div>
</div>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
    layui.use('element', function(){
        var element = layui.element; //导航的hover效果、二级菜单等功能，需要依赖element模块
        //监听导航点击
        element.on('nav(left-nav)', function(elem){
            if (elem.hasClass('location')) {
                var url = elem.data('url');
                $('#container-iframe').attr('src', url);
            }
        });
        element.init();
    });
</script>