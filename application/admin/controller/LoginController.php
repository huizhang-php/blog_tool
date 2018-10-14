<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/10 下午1:25
 * Description:
 */
namespace app\admin\controller;

use app\admin\service\LoginService;
use tool\MyResponse;
use tool\MyRequest;
use think\facade\Session;
use think\Controller;

class LoginController extends Controller {

    // 自定义request
    use MyRequest;
    // 自定义response
    use MyResponse;

    /**
     * Description: 登录页面
     * User: 郭玉朝
     * CreateTime: 2018/10/10 下午1:27
     */
    public function login_view() {
        return view();
    }

    /**
     * Description: 验证登录
     * User: 郭玉朝
     * CreateTime: 2018/10/10 下午5:01
     */
    public function check_login() {
        // 验证参数
        $checkParams = $this->checkParams(['admin_name','admin_password']);
        if ($checkParams !== true) {
            return $this->sendMsg(401, $checkParams);
        }
        // 验证是否存在此管理员
        $adminInfo = LoginService::instance()->checkLogin($this->postParams);
        if ($adminInfo) {
            // 存入session
            session('admin_id',$adminInfo['id']);
            session('admin_name',$adminInfo['admin_name']);
            return $this->sendMsg(200, '登录成功，正在跳转...');
        }
        return $this->sendMsg(400, '登录失败，请重试...');
    }

    /**
     * Description: 退出登录
     * User: 郭玉朝
     * CreateTime: 2018/10/11 上午10:54
     */
    public function unlogin() {
        session(null);
        $this->redirect('login_view');
    }

}
