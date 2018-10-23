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
}