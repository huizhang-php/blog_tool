<?php /*a:2:{s:74:"/Users/guoyuzhao/sites/tuzisir-tool/application/admin/view/tool/index.html";i:1539340039;s:77:"/Users/guoyuzhao/sites/tuzisir-tool/application/admin/view/common/header.html";i:1539250433;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tuzisir Tool!</title>
    <meta name="keywords" content="tuzisir" />
    <meta name="description" content="tuzisir" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <script src="/tuzisir-tool/public/static/common/js/jquery.min.js" ></script>
    <script src="/tuzisir-tool/public/static/common/layui/layui.all.js"></script>
    <link href="/tuzisir-tool/public/static/common/layui/css/layui.css" rel="stylesheet">
    <link href="/tuzisir-tool/public/static/common/css/tuzisir.css" rel="stylesheet">
    <script src="/tuzisir-tool/public/static/common/js/my.layui.pack.js"></script>
</head>
<body>


<style type="text/css">
    .layui-table-cell {
        height: auto;
        line-height: 28px;
    }
</style>
<div style="padding: 1rem 0rem 1rem 1rem;">
    <span class="layui-breadcrumb" lay-separator="—">
        <a href="">Tool 管理</a>
        <a href="">Tool 列表</a>
    </span>
</div>
<hr class="layui-bg-orange">
<script type="text/html" id="top-btn">
    <div class="layui-btn-container">
        <a href="<?php echo url('/admin/tool/add_tool'); ?>">
            <button class="layui-btn layui-btn-sm" lay-event="getCheckData">添加Tool</button>
        </a>
        <button class="layui-btn layui-btn-sm layui-btn-danger" lay-event="del-tool">删除Tool</button>
    </div>
</script>

<script type="text/html" id="pic_url">
    <img src="{{d.pic_url}}" style="height: 100%;width: 100%;">
</script>

<script type="text/html" id="right-btn">
    <a href="<?php echo url('/admin/tool/edit_tool'); ?>?id={{d.id}}" class="layui-btn layui-btn-xs" lay-event="right-btn">修改</a>
    <a href="{{d.url}}" class="layui-btn layui-btn-xs layui-btn-warm" lay-event="right-btn">访问</a>
</script>
<table class="layui-hide" lay-filter="tool-list" id="tool-list"></table>
<script>
    layui.use(['table','element'], function(){
        var table = layui.table;
        var element = layui.element;
        element.init();

        table.render({
            elem: '#tool-list'
            ,toolbar: '#top-btn'
            ,url: "<?php echo url('/admin/tool/get_tools'); ?>"
            ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
            ,cols: [[
                {type:'checkbox'}
                ,{field:'id', title: 'ID',width:50, sort: true}
                ,{field:'pic_url', title: 'Tool图片',templet: '#pic_url'}
                ,{field:'title', title: 'Tool标题'}
                ,{field:'brief_introduction', title: 'Tool简介'}
                ,{field:'url', title: 'Tool地址'}
                ,{field:'visit_num', title: '访问量',width:80, sort: true}
                ,{field:'c_time', width:165, title: '添加时间', sort: true}
                ,{field:'u_time', width:165, title: '更新时间', sort: true}
                ,{fixed: 'right', title:'操作', toolbar: '#right-btn', width:150}
            ]]
            ,page: true
        });
        //头工具栏事件
        table.on('toolbar(tool-list)', function(obj){
            var checkStatus = table.checkStatus(obj.config.id);
            switch(obj.event){
                case 'del-tool':
                    var data = checkStatus.data;
                    var curlData={};
                    $.each(data,function(n,value){
                        curlData[n] = value.id;
                    });
                    layer.confirm('一旦删除不可恢复，是否继续？', {btn: ['确定','取消'],icon: 3}, function() {
                        // 请求删除接口
                        curlAjax("<?php echo url('admin/tool/del_tool'); ?>", curlData, 'commonReturn');
                    });
                    break;
            };
        });
    });
    // 公共回调方法
    function commonReturn(data) {
        tipMsg(data.code, data.msg);
    }
</script>
