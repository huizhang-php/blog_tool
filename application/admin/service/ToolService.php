<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/11 下午9:03
 * Description:
 */
namespace app\admin\service;

use app\common\model\ToolModel;
use app\common\tool\MyTime;

class ToolService {

    /**
     * User: 郭玉朝
     * CreateTime: 2018/10/11 下午9:22
     * @var $toolModel ToolModel
     * Description: 工具模型层
     */
    private $toolModel;

    /**
     * ToolService constructor.
     */
    public function __construct() {
        $this->toolModel = new ToolModel();
    }

    public static function instance() {
        return new ToolService();
    }

    /**
     * Description: 修改工具信息
     * User: 郭玉朝
     * CreateTime: 2018/10/12 上午10:45
     */
    public function editTool($params) {
        $condition['id'] = $params['id'];
        unset($params['id']);
        unset($params['file']);
        $params['u_time'] = MyTime::getDataTime();
        return $this->toolModel->editTool($condition, $params);
    }

    /**
     * Description: 删除工具信息
     * User: 郭玉朝
     * CreateTime: 2018/10/11 下午11:44
     * @param $condition
     * @return mixed
     */
    public function delTool($condition) {
        return $this->toolModel->delTool($condition);
    }

    /**
     * Description: 根据条件获取工具列表
     * User: 郭玉朝
     * CreateTime: 2018/10/11 下午9:40
     * @param $condition
     * @return array|\PDOStatement|string|\think\Collection
     */
    public function getTools($condition=[]) {
        return $this->toolModel->getTools($condition);
    }

    /**
     * Description: 添加工具
     * User: 郭玉朝
     * CreateTime: 2018/10/11 下午9:19
     * @param $data
     */
    public function addTool($data) {
        $dataTime = MyTime::getDataTime();
        $data['c_time'] = $dataTime;
        $data['u_time'] = $dataTime;
        return $this->toolModel->addTool($data);
    }

}
