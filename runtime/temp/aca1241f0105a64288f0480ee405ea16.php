<?php /*a:4:{s:77:"/Users/guoyuzhao/sites/tuzisir-tool/application/blog/view/tool/tool_view.html";i:1539334065;s:76:"/Users/guoyuzhao/sites/tuzisir-tool/application/blog/view/common/header.html";i:1539346788;s:73:"/Users/guoyuzhao/sites/tuzisir-tool/application/blog/view/common/nav.html";i:1539333671;s:76:"/Users/guoyuzhao/sites/tuzisir-tool/application/blog/view/common/footer.html";i:1538641708;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tuzisir</title>
    <meta name="keywords" content="tuzisir" />
    <meta name="description" content="tuzisir" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/static/blog/css/base.css" rel="stylesheet">
    <link href="/static/blog/css/index.css" rel="stylesheet">
    <link href="/static/blog/css/m.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <script src="/static/common/js/jquery.min.js" ></script>
    <script src="/static/blog/js/jquery.easyfader.min.js"></script>
    <script src="/static/blog/js/hc-sticky.js"></script>
    <!--<script src="/tuzisir/public/static/blog/js/comm.js"></script>-->
    <script src="/static/blog/js/scrollReveal.js"></script>
    <script src="/static/blog/js/modernizr.js"></script>
    <script src="/static/common/layui/layui.all.js"></script>
    <link href="/static/common/layui/css/layui.css" rel="stylesheet">
</head>
<body>
<header class="header-navigation" id="header">
    <nav>
        <div class="logo"><a href="#">Tuzisir</a></div>
        <h2 id="mnavh"><span class="navicon"></span></h2>
        <ul id="starlist">
            <li><a href="<?php echo url('blog/tool/tool_view'); ?>">码农Tool</a></li>
        </ul>
        <div class="searchbox">
            <div id="search_bar" class="search_bar">
            </div>
        </div>
    </nav>
</header>
<style>
    img{
        width:auto;
        height:auto;
        max-width:100%;
        max-height:100%;
    }
</style>

<article>
    <main style="width: 30%;">
        <div class="news_box">
            <ul>
                <?php foreach($toolList as $toolKey=>$toolValue): ?>
                    <a href="#" >
                        <li class="left-nav" data-url="<?php echo htmlentities($toolValue['url']); ?>" style="width: 100%;">
                            <i>
                                <img src="<?php echo htmlentities($toolValue['pic_url']); ?>">
                            </i>
                            <h3><?php echo htmlentities($toolValue['title']); ?></h3>
                        </li><br>
                    </a>
                <?php endforeach; ?>
            </ul>
        </div>
    </main>
    <iframe src="http://www.eteste.com/" id="right-iframe" style="border:3px solid #fff9ec;height:800px;width: 67%;float: right;" frameborder="0"></iframe>
</article>
<footer>
    <p>Design by <a href="/" target="_blank">Tuzisir</a> <a href="/">陕ICP备11002373号-1</a><a href="/" class="links">友情链接</a></p>
</footer>
<a href="#" class="cd-top">Top</a>
</body>
</html>
<script>
    $(function () {
        changeIframe();
    });
    // 改变右侧iframe显示
    function changeIframe() {
        $('.left-nav').click(function () {
            console.log($(this).data('url'));
            $('#right-iframe').attr('src', $(this).data('url'));
        });
    }
</script>

