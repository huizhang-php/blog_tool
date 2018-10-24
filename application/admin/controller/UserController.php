<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/24 下午10:21
 * Email: shixi_yuzhao@staff.weibo.com
 * Description:
 */
namespace app\admin\controller;

use app\admin\service\UserService;
use think\Controller;
use tool\MyRequest;
use tool\MyResponse;

class UserController extends Controller {

    use MyRequest;
    use MyResponse;

    /**
     * User: yuzhao
     * CreateTime: 2018/10/24 下午10:21
     * Email: shixi_yuzhao@staff.weibo.com
     * Description: 用户列表页面
     */
    public function user_view() {
        return view();
    }

    public function get_user_list() {
        // 获取用户列表
        $userList = UserService::instance()->getUserList();
        die($this->sendMsg(0, '获取数据成功', $userList, ['count' => count($userList)]));
    }

    /**
     * User: yuzhao
     * CreateTime: 2018/10/24 下午10:55
     * Email: shixi_yuzhao@staff.weibo.com
     * Description: 禁用启用
     */
    public function prohibit() {
        $checkParams = $this->checkParams(['id', 'status']);
        if ($checkParams !== true) {
            return $this->sendMsg(401, $checkParams);
        }
        // 修改状态
        if (UserService::instance()->editUserStatus($this->postParams)) {
            return $this->sendMsg(200, '修改用户状态成功');
        }
        return $this->sendMsg(400, '修改用户状态失败');
    }

}