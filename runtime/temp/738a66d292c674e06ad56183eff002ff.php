<?php /*a:2:{s:70:"/Users/guoyuzhao/sites/tuzitest/application/admin/view/tool/index.html";i:1539257449;s:73:"/Users/guoyuzhao/sites/tuzitest/application/admin/view/common/header.html";i:1539250433;}*/ ?>
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

<div style="padding: 1rem 0rem 1rem 1rem;">
    <span class="layui-breadcrumb" lay-separator="—">
        <a href="">Tool 管理</a>
        <a href="">Tool 列表</a>
    </span>
</div>
<div style="margin-left: 1rem;">
    <a href="<?php echo url('/admin/tool/add_tool'); ?>">
        <button class="layui-btn">添加Tool</button>
    </a>
    <button class="layui-btn layui-btn-danger">删除Tool</button>
</div>
<table class="layui-hide" id="test"></table>
<script>
    layui.use(['table','element'], function(){
        var table = layui.table;
        var element = layui.element;
        element.init();

        table.render({
            elem: '#test'
            ,url:'#'
            ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
            ,cols: [[
                {field:'id', title: 'ID', sort: true}
                ,{field:'title', title: 'Tool标题'}
                ,{field:'introduction', title: 'Tool简介'}
                ,{field:'url', title: 'Tool地址'}
                ,{field:'visit_num', title: '访问量', sort: true}
                ,{field:'classify', title: '操作'}
            ]]
        });
    });
</script>
