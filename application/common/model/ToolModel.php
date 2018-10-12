<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/11 下午9:12
 * Description:
 */
namespace app\common\model;

use think\Exception;
use think\Model;

class ToolModel extends Model {

    // 设置当前模型对应的完整数据表名称
    protected $table = 'tool';

    /**
     * Description: 删除工具信息
     * User: 郭玉朝
     * CreateTime: 2018/10/11 下午11:45
     */
    public function delTool($condition) {
        return $this::destroy($condition);
    }

    /**
     * Description: 修改工具信息
     * User: 郭玉朝
     * CreateTime: 2018/10/12 上午10:47
     */
    public function editTool($condition, $data) {
        return $this->where($condition)->update($data);
    }

    /**
     * Description:
     * User: 郭玉朝
     * CreateTime: 2018/10/11 下午9:40
     */
    public function getTools($condition=[]) {
        $sql = $this;
        if (!empty($condition)) {
            $sql = $sql->where($condition);
        }
        return $sql->select();
    }

    /**
     * Description: 添加工具
     * User: 郭玉朝
     * CreateTime: 2018/10/11 下午9:23
     * @param $data
     * @return false|int
     */
    public function addTool($data) {
        return $this->save($data);
    }

}