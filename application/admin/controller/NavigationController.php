<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/15 上午11:22
 * Description:
 */
namespace app\admin\controller;
use app\admin\controller\BaseController;
use app\admin\service\NavigationService;
use think\facade\Request;
use tool\MyRequest;
use tool\MyResponse;

class NavigationController extends BaseController {
    use MyRequest;
    use MyResponse;

    /**
     * Description: 导航主页面
     * User: 郭玉朝
     * CreateTime: 2018/10/15 上午11:23
     */
    public function navigation() {
        return view();
    }

    /**
     * Description: 获取导航栏列表
     * User: 郭玉朝
     * CreateTime: 2018/10/15 上午11:28
     */
    public function get_navs() {
        // 查找所有数据
        $toolList  = NavigationService::instance()->getNavs()->toArray();
        $toolCount = count($toolList);
        if (empty($toolList)) {
            die($this->sendMsg(400, '获取数据失败'));
        }
        die($this->sendMsg(0, '获取数据成功', $toolList, ['count' => $toolCount]));
    }

    /**
     * Description: 添加导航栏
     * User: 郭玉朝
     * CreateTime: 2018/10/15 下午1:32
     * @return string|\think\response\View
     */
    public function add_nav() {
        if (Request::isGet()) {
            return view();
        }
        // 验证参数
        $checkParams = $this->checkParams(['nav_url', 'nav_name', 'type', 'brief_introduction']);
        if ($checkParams !== true) {
            return $this->sendMsg(401, $checkParams);
        }
        // 添加tool
        if (NavigationService::instance()->addNav($this->postParams)) {
            return $this->sendMsg(200, '添加Tool成功');
        }
        return $this->sendMsg(400, '添加Tool失败');
    }

    /**
     * Description: 修改导航栏
     * User: 郭玉朝
     * CreateTime: 2018/10/15 下午1:32
     */
    public function edit_nav() {
        if (Request::isGet()) {
            // 验证参数
            $checkParams = $this->checkParams(['id']);
            if ($checkParams !== true) {
                return $this->sendMsg(401, $checkParams);
            }
            // 获取导航栏信息
            $navInfo = NavigationService::instance()->getNavs(['id'=>$this->getParams['id']]);
            $this->assign('navInfo', $navInfo[0]);
            return view();
        }
        // 验证参数
        $checkParams = $this->checkParams(['id', 'nav_name', 'nav_url', 'type', 'brief_introduction']);
        if ($checkParams !== true) {
            return $this->sendMsg(401, $checkParams);
        }
        // 修改tool
        if (NavigationService::instance()->editNav($this->postParams)) {
            return $this->sendMsg(200, '修改导航栏成功');
        }
        return $this->sendMsg(400, '修改导航栏失败');
    }

    /**
     * Description: 删除导航栏
     * User: 郭玉朝
     * CreateTime: 2018/10/15 下午1:46
     */
    public function del_nav() {
        $delReturn = NavigationService::instance()->delNav($this->postParams);
        if ($delReturn) {
            return $this->sendMsg(200, '删除导航栏信息成功');
        }
        return $this->sendMsg(400, '删除导航栏信息失败');
    }

    /**
     * Description: 改变状态
     * User: 郭玉朝
     * CreateTime: 2018/10/15 上午10:52
     */
    public function prohibit() {
        $checkParams = $this->checkParams(['id', 'status']);
        if ($checkParams !== true) {
            return $this->sendMsg(401, $checkParams);
        }
        // 修改状态
        if (NavigationService::instance()->editNav($this->postParams)) {
            return $this->sendMsg(200, '修改状态栏状态成功');
        }
        return $this->sendMsg(400, '修改状态栏状态失败');
    }
}