<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/11 下午9:03
 * Description:
 */
namespace app\admin\service;

use app\common\model\NavigationModel;
use app\common\model\ToolModel;
use tool\MyTime;

class NavigationService {

    /**
     * User: 郭玉朝
     * CreateTime: 2018/10/11 下午9:22
     * @var $toolModel NavigationModel
     * Description: 工具模型层
     */
    private $navModel;

    /**
     * ToolService constructor.
     */
    public function __construct() {
        $this->navModel = new NavigationModel();
    }

    public static function instance() {
        return new NavigationService();
    }

    /**
     * Description: 获取导航栏
     * User: 郭玉朝
     * CreateTime: 2018/10/11 下午9:40
     * @param $condition
     * @return array|\PDOStatement|string|\think\Collection
     */
    public function getNavs($condition=[]) {
        return $this->navModel->getNavs($condition);
    }

    /**
     * Description: 添加导航栏
     * User: 郭玉朝
     * CreateTime: 2018/10/15 上午11:55
     * @param $data
     * @return mixed
     */
    public function addNav($data) {
        $dataTime = MyTime::getDataTime();
        $data['c_time'] = $dataTime;
        $data['u_time'] = $dataTime;
        return $this->navModel->addNav($data);
    }

    /**
     * Description: 修改导航栏
     * User: 郭玉朝
     * CreateTime: 2018/10/15 下午1:40
     * @param $params
     * @return mixed
     */
    public function editNav($params) {
        $condition['id'] = $params['id'];
        unset($params['id']);
        $params['u_time'] = MyTime::getDataTime();
        return $this->navModel->editNav($condition, $params);
    }


    public function delNav($condition) {
        return $this->navModel->delNav($condition);
    }


}
