<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/4 下午4:29
 * Description: 程序员工具
 */
namespace app\blog\controller;

use app\blog\service\ToolService;
use app\common\tool\MyRequest;
use app\common\tool\MyResponse;
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
        //连接本地的 Redis 服务
        $redis = new \Redis();
        $redis->connect('39.106.144.125', 6379);
        $redis->set('tuzi',123);
        // 查找工具
        $toolList = ToolService::instance()->getToolList();
        $this->assign('toolList', $toolList);
        return view();
    }
}