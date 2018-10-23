<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/21 下午10:03
 * Description:
 */
namespace app\blog\controller;

use think\Controller;
use think\facade\Request;
use tool\MyRequest;
use tool\MyResponse;
use app\blog\service\LoginService;

class LoginController extends Controller {

    use MyResponse;
    use MyRequest;

    /**
     * User: yuzhao
     * CreateTime: 2018/10/23 下午10:17
     * @return string
     * Email: shixi_yuzhao@staff.weibo.com
     * Description: qq登录
     */
    public function qqLogin() {
        if (Request::isGet()) {
            return view();
        }
        // qq注册
        if (LoginService::instance()->qqLogin($this->postParams)) {
            return $this->sendMsg(200, '注册成功');
        }
        return $this->sendMsg(400, '注册失败');
    }
}