<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/10 下午1:25
 * Description:
 */
namespace app\admin\controller;

use think\Controller;
use app\common\tool\MyResponse;
use app\common\tool\MyRequest;

class IndexController extends BaseController {

    // 自定义request
    use MyRequest;
    // 自定义response
    use MyResponse;

    /**
     * Description: 登录页面
     * User: 郭玉朝
     * CreateTime: 2018/10/10 下午1:27
     */
    public function index() {
        return view();
    }
}
