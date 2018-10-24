<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/23 下午10:19
 * Email: shixi_yuzhao@staff.weibo.com
 * Description: 登录服务层
 */

namespace app\blog\service;

use app\common\model\UserModel;
use app\common\third_party_api\qq\QqApi;
use tool\MyCurl;
use tool\MyTime;

class LoginService {

    /**
     * User: yuzhao
     * CreateTime: 2018/10/23 下午10:27
     * @var
     * Email: shixi_yuzhao@staff.weibo.com
     * Description: user model
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
     * Description: back now obj
     */
    public static function instance() {
        return new LoginService();
    }

    /**
     * User: yuzhao
     * CreateTime: 2018/10/23 下午10:20
     * Email: shixi_yuzhao@staff.weibo.com
     * Description: qq login
     */
    public function qqLogin($params) {
        // get user base info
        $qqUserInfo = QqApi::instance()->getUserInfo($params['access_token'], $params['open_id']);
        if ($qqUserInfo === false) {
            return false;
        }
        // pack condition and data
        $this->packConData($qqUserInfo, $params, $condition, $data);
        // find user info
        $userInfo = $this->userModel->findUser($condition);
        // Determine whether the user is disabled.
        if ($userInfo['status'] === 0) {
            return false;
        }
        // if user info is empty
        if (empty($userInfo)) {
            $data = array_merge($data, [
                'c_time'    => MyTime::getDataTime(),
                'qq_open_id'=> $params['open_id'],

            ]);
            if (!$this->userModel->addUser($data)) {
                return false;
            }
        } else {
            $this->userModel->updateUser($condition, $data);
        }
        return true;
    }

    /**
     * User: yuzhao
     * CreateTime: 2018/10/24 上午10:26
     * @param $qqUserInfo
     * @param $params
     * @param $condition
     * @param $data
     * Email: shixi_yuzhao@staff.weibo.com
     * Description: pack register condition and data
     */
    private function packConData($qqUserInfo, $params, &$condition, &$data) {
        // check whether there is openid
        $condition = [
            'qq_open_id'    => $params['open_id']
        ];
        $data = [
            'u_time'    => MyTime::getDataTime(),
            'nickname'  => $qqUserInfo['nickname'],
            'city'      => $qqUserInfo['city'],
            'year'      => $qqUserInfo['year'],
            'province'  => $qqUserInfo['province']
        ];
        if ($qqUserInfo['gender'] === '女') {
            $data['gender'] = 0;
        }
    }
}