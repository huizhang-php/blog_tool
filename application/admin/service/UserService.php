<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/24 下午10:33
 * Email: shixi_yuzhao@staff.weibo.com
 * Description:
 */
namespace app\admin\service;

use app\common\model\UserModel;

class UserService {

    /**
     * User: yuzhao
     * CreateTime: 2018/10/24 下午10:34
     * @var $userModel UserModel
     * Email: shixi_yuzhao@staff.weibo.com
     * Description: 用户模型
     */
    private $userModel;

    /**
     * UserService constructor.
     */
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    /**
     * User: yuzhao
     * CreateTime: 2018/10/24 下午10:38
     * Email: shixi_yuzhao@staff.weibo.com
     * Description: 获取当前对象
     */
    public static function instance() {
        return new UserService();
    }

    /**
     * User: yuzhao
     * CreateTime: 2018/10/24 下午10:36
     * Email: shixi_yuzhao@staff.weibo.com
     * Description: 获取用户列表
     */
    public function getUserList() {
        return $this->userModel->getUserList();
    }

    /**
     * User: yuzhao
     * CreateTime: 2018/10/24 下午10:56
     * Email: shixi_yuzhao@staff.weibo.com
     * Description: 修改用户信息
     */
    public function editUserStatus($params) {
        $condition['id'] = $params['id'];
        $data['status'] = $params['status'];
        return $this->userModel->updateUser($condition, $data);
    }

}