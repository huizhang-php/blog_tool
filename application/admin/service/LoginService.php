<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/10 下午5:49
 * Description:
 */
namespace app\admin\service;

use app\common\model\AdminModel;

class LoginService {

    /**
     * User: 郭玉朝
     * CreateTime: 2018/10/10 下午5:51
     * @var
     * Description: 管理员模型层
     */
    private $adminModel;

    /**
     * LoginService constructor.
     */
    public function __construct() {
        $this->adminModel = new AdminModel();
    }

    /**
     * Description: 返回当前对象
     * User: 郭玉朝
     * CreateTime: 2018/10/10 下午5:52
     */
    public static function instance() {
        return new LoginService();
    }

    /**
     * Description: 验证登录
     * User: 郭玉朝
     * CreateTime: 2018/10/10 下午5:49
     * @param $data
     */
    public function checkLogin($data) {
        // 是否有此用户
        return $this->adminModel->findAdmin($data);
    }

}