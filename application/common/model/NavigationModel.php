<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/11 下午9:12
 * Description:
 */
namespace app\common\model;

use think\Exception;
use think\Model;

class NavigationModel extends Model {

    // 设置当前模型对应的完整数据表名称
    protected $table = 'navigation';

    /**
     * Description: 获取工具栏
     * User: 郭玉朝
     * CreateTime: 2018/10/15 上午11:32
     * @param $condition
     */
    public function getNavs($condition, $order='') {
        $sql = $this;
        if (!empty($condition)) {
            $sql = $sql->where($condition);
        }
        if ($order!=='') {
            $sql = $sql->order($order,'desc');
        }
        return $sql->select();
    }

    /**
     * Description: 添加导航栏
     * User: 郭玉朝
     * CreateTime: 2018/10/15 上午11:55
     * @param $data
     */
    public function addNav($data) {
        return $this->save($data);
    }

    /**
     * Description: 修改导航栏
     * User: 郭玉朝
     * CreateTime: 2018/10/15 下午1:41
     * @param $condition
     * @param $data
     */
    public function editNav($condition, $data) {
        return $this->isUpdate(false)->where($condition)->update($data);
    }

    /**
     * Description: 删除导航栏
     * User: 郭玉朝
     * CreateTime: 2018/10/15 下午1:48
     * @param $condition
     * @return int
     */
    public function delNav($condition) {
        return $this::destroy($condition);
    }

}