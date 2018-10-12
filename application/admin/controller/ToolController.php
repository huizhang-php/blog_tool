<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/11 下午12:36
 * Description:
 */
namespace app\admin\controller;

use think\Controller;
use app\common\tool\MyResponse;
use app\common\tool\MyRequest;
use app\common\tool\MyData;
use think\facade\Request;
use app\admin\service\ToolService;

class ToolController extends BaseController {

    use MyRequest;
    use MyResponse;

    /**
     * Description: 工具管理主页面
     * User: 郭玉朝
     * CreateTime: 2018/10/11 下午12:36
     */
    public function index() {
        return view();
    }

    /**
     * Description: 修改工具信息
     * User: 郭玉朝
     * CreateTime: 2018/10/12 上午9:57
     */
    public function edit_tool() {
        if (Request::isGet()) {
            // 验证参数
            $checkParams = $this->checkParams(['id']);
            if ($checkParams !== true) {
                return $this->sendMsg(401, $checkParams);
            }
            // 查询工具的详细信息
            $toolInfo = ToolService::instance()->getTools(['id'=>5]);
            $this->assign('toolInfo', $toolInfo[0]);
            return $this->fetch();
        }
        // 验证参数
        $checkParams = $this->checkParams(['id', 'pic_url', 'title', 'url', 'brief_introduction']);
        if ($checkParams !== true) {
            return $this->sendMsg(401, $checkParams);
        }
        // 修改tool
        if (ToolService::instance()->editTool($this->postParams)) {
            return $this->sendMsg(200, '修改Tool成功');
        }
        return $this->sendMsg(400, '修改Tool失败');
    }

    /**
     * Description: 获取工具数据
     * User: 郭玉朝
     * CreateTime: 2018/10/11 下午11:39
     */
    public function get_tools() {
        // 查找所有数据
        $toolList  = ToolService::instance()->getTools()->toArray();
        $toolCount = count($toolList);
        if (empty($toolList)) {
            die($this->sendMsg(400, '获取数据失败'));
        }
        die($this->sendMsg(0, '获取数据成功', $toolList, ['count' => $toolCount]));
    }

    /**
     * Description: 删除工具信息
     * User: 郭玉朝
     * CreateTime: 2018/10/11 下午11:39
     */
    public function del_tool() {
        $delReturn = ToolService::instance()->delTool($this->postParams);
        if ($delReturn) {
            return $this->sendMsg(200, '删除工具信息成功');
        }
        return $this->sendMsg(400, '删除工具信息失败');
    }

    /**
     * Description: 添加工具页面
     * User: 郭玉朝
     * CreateTime: 2018/10/11 下午5:20
     */
    public function add_tool() {
        if (Request::isGet()) {
            return view();
        }
        // 验证参数
        $checkParams = $this->checkParams(['pic_url', 'title', 'url', 'brief_introduction']);
        if ($checkParams !== true) {
            return $this->sendMsg(401, $checkParams);
        }
        // 添加tool
        if (ToolService::instance()->addTool($this->postParams)) {
            return $this->sendMsg(200, '添加Tool成功');
        }
        return $this->sendMsg(400, '添加Tool失败');
    }

    /**
     * Description: 上传文件
     * User: 郭玉朝
     * CreateTime: 2018/10/11 下午7:25
     */
    public function upload_img() {
        $info = $this->fileParam->move('./imgs/tool');
        if($info){
             return $this->sendMsg(200, '上传图片成功',
                 ['file_url'   => '/imgs/tool/' . $info->getSaveName()]);
        }else{
             return $this->sendMsg(400, '上传文件失败', []);
        }
    }

}
