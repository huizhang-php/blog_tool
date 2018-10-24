<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/23 下午10:23
 * Email: shixi_yuzhao@staff.weibo.com
 * Description: 用户模型层
 */
namespace app\common\model;

use think\Model;

class UserModel extends Model {

    // 当前模型对应的表名称
    protected $table = 'user';

    /**
     * User: yuzhao
     * CreateTime: 2018/10/23 下午10:25
     * Email: shixi_yuzhao@staff.weibo.com
     * Description: 查找用户
     */
    public function findUser($condition) {
        return $this->where($condition)->find();
    }

    /**
     * User: yuzhao
     * CreateTime: 2018/10/23 下午10:31
     * @param $data
     * Email: shixi_yuzhao@staff.weibo.com
     * Description: 添加用户
     */
    public function addUser($data) {
        return $this->save($data);
    }

    /**
     * User: yuzhao
     * CreateTime: 2018/10/24 上午10:21
     * @param $condition
     * Email: shixi_yuzhao@staff.weibo.com
     * Description: 更新用户信息
     */
    public function updateUser($condition, $data) {
       return $this->where($condition)->update($data);
    }

    /**
     * User: yuzhao
     * CreateTime: 2018/10/24 下午10:37
     * Email: shixi_yuzhao@staff.weibo.com
     * Description: 获取用户列表
     */
    public function getUserList() {
        return $this->select();
    }
}