<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/12 下午4:01
 * Description:
 */
namespace app\blog\service;

use app\common\model\ToolModel;

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
     * Description: 获取Tool列表
     * User: 郭玉朝
     * CreateTime: 2018/10/12 下午4:02
     * @param array $condition
     * @return array|\PDOStatement|string|\think\Collection
     */
    public function getToolList($condition=[]) {
        $condition['status'] = 1;
        return $this->toolModel->getTools($condition);
    }
}
