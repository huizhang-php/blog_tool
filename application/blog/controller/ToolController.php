<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/4 下午4:29
 * Description: 程序员工具
 */
namespace app\blog\controller;

use app\blog\service\ToolService;
use tool\MyRequest;
use tool\MyResponse;
use tool\MyRedis;
use think\Controller;

class ToolController extends Controller {

    use MyResponse;
    use MyRequest;

    /**
     * Description: 时间工具
     * User: 郭玉朝
     * CreateTime: 2018/10/4 下午4:33
     */
    public function tool_view() {
        // 查找工具
        $toolList = ToolService::instance()->getToolList([],'visit_num');
        $this->assign('toolList', $toolList);
        return view();
    }

    /**
     * Description: 增加阅读量
     * User: 郭玉朝
     * CreateTime: 2018/10/13 下午6:25
     */
    public function add_visit_num() {
        // 验证参数
        $checkParams = $this->checkParams(['id']);
        if ($checkParams !== true) {
            return $this->sendMsg(401, $checkParams);
        }
        // 推入队列
        MyRedis::instance()->rPush('tool_visit', $this->postParams['id']);
        return $this->sendMsg(200,'');
    }
}