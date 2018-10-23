<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/23 下午10:19
 * Email: shixi_yuzhao@staff.weibo.com
 * Description: 登录服务层
 */

namespace app\blog\service;

use app\common\model\UserModel;
use tool\MyCurl;
use tool\MyTime;

class LoginService {

    /**
     * User: yuzhao
     * CreateTime: 2018/10/23 下午10:27
     * @var
     * Email: shixi_yuzhao@staff.weibo.com
     * Description: 用户模型
     */
    private $userModel;

    /**
     * LoginService constructor.
     */
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    /**
     * User: yuzhao
     * CreateTime: 2018/10/23 下午10:26
     * Email: shixi_yuzhao@staff.weibo.com
     * Description: 返回当前服务层
     */
    public static function instance() {
        return new LoginService();
    }

    /**
     * User: yuzhao
     * CreateTime: 2018/10/23 下午10:20
     * Email: shixi_yuzhao@staff.weibo.com
     * Description: qq登录
     */
    public function qqLogin($params) {
        // 获取用户基本信息
        $qqUserInfo = MyCurl::instance('https://graph.qq.com/user/get_user_info?access_token='.
            $params['access_token']."&oauth_consumer_key=101406703&openid=".$params['open_id'])->get();
        $qqUserInfo = json_decode($qqUserInfo, JSON_UNESCAPED_UNICODE);
        if (empty($qqUserInfo)) {
            return false;
        }
        // 检查是否有此open_id
        $condition = [
            'qq_open_id'    => $params['open_id']
        ];
        $userInfo = $this->userModel->findUser($condition);
        if (empty($userInfo)) {
            // 入库
            $data = [
                'c_time'    => MyTime::getDataTime(),
                'u_time'    => MyTime::getDataTime(),
                'qq_open_id'=> $params['open_id'],
                'nickname'  => $qqUserInfo['nickname'],
                'city'      => $qqUserInfo['city'],
                'year'      => $qqUserInfo['year'],
                'province'  => $qqUserInfo['province']
            ];
            if ($qqUserInfo['gender'] === '女') {
                $data['gender'] = 0;
            }
            if (!$this->userModel->addUser($data)) {
                return false;
            }
        }
        return true;
    }
}