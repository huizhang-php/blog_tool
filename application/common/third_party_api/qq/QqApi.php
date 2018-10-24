<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/24 上午9:58
 * Email: shixi_yuzhao@staff.weibo.com
 * Description:
 */

namespace app\common\third_party_api\qq;

use tool\MyCurl;

class QqApi {

    /**
     * QqApi constructor.
     */
    public function __construct()
    {
    }

    /**
     * User: yuzhao
     * CreateTime: 2018/10/24 上午9:59
     * Email: shixi_yuzhao@staff.weibo.com
     * Description: 返回当前对象
     */
    public static function instance() {
        return new QqApi();
    }

    /**
     * User: yuzhao
     * CreateTime: 2018/10/24 上午9:59
     * Email: shixi_yuzhao@staff.weibo.com
     * Description: 获取用户信息
     */
    public function getUserInfo($accessToken, $openId) {
        $qqUserInfo = MyCurl::instance(config('myself.qq.qq_api.get_user_info').'?access_token='.
            $accessToken.'&oauth_consumer_key=' . config('myself.qq.app_id') .
            '&openid='.$openId)->get();
        if (empty($qqUserInfo)) {
            return false;
        }
        return json_decode($qqUserInfo, JSON_UNESCAPED_UNICODE);
    }
}