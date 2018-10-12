<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/10 下午5:46
 * Description:
 */
namespace app\common\model;

use think\Exception;
use think\Model;

class AdminModel extends Model {

    // 设置当前模型对应的完整数据表名称
    protected $table = 'admin';

    /**
     * Description: 获取管理员信息
     * User: 郭玉朝
     * CreateTime: 2018/10/10 下午6:00
     */
    public function getAdminInfo($condition) {
        try {
            return $this->where($condition)->select();
        } catch (Exception $e) {

        }
        return [];
    }

    /**
     * Description: 查找管理员是否存在
     * User: 郭玉朝
     * CreateTime: 2018/10/10 下午6:00
     */
    public function findAdmin($condition) {
        try {
            return $this->where($condition)->find();
        } catch (Exception $e) {

        }
        return false;
    }

}