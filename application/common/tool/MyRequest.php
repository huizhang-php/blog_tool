<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/10 下午5:09
 * Description:
 */
namespace app\common\tool;

use app\admin\controller\LoginController;
use think\File;

trait MyRequest {

    /**
     * User: 郭玉朝
     * CreateTime: 2018/10/10 下午5:11
     * @var
     * Description: 存放get参数
     */
    public $getParams;

    /**
     * User: 郭玉朝
     * CreateTime: 2018/10/10 下午5:13
     * @var
     * Description: 存放post参数
     */
    public $postParams;

    /**
     * User: 郭玉朝
     * CreateTime: 2018/10/10 下午5:14
     * @var
     * Description: 获取所有参数
     */
    public $allParams;

    /**
     * User: 郭玉朝
     * CreateTime: 2018/10/11 下午7:50
     * @var $fileParam File
     * Description: 文件
     */
    public $fileParam;

    /**
     * ParamsController constructor.
     */
    public function __construct() {
        // get参数
        $this->getGetParams();
        // post参数
        $this->getPostParams();
        // 所有参数
        $this->getAllParams();
        // 获取文件信息
        $this->getFileParam();

        parent::__construct();
    }

    /**
     * Description: 获取文件信息
     * User: 郭玉朝
     * CreateTime: 2018/10/11 下午7:51
     */
    protected function getFileParam() {
        $this->fileParam = request()->file('file');
    }

    /**
     * Description: 获取所有参数
     * User: 郭玉朝
     * CreateTime: 2018/10/10 下午5:15
     */
    protected function getAllParams() {
        $this->allParams = input();
    }

    /**
     * Description: 获取get参数
     * User: 郭玉朝
     * CreateTime: 2018/10/10 下午5:10
     */
    protected function getGetParams() {
         $this->getParams = input('get.');
    }

    /**
     * Description: 获取post参数
     * User: 郭玉朝
     * CreateTime: 2018/10/10 下午5:10
     */
    protected function getPostParams() {
        $this->postParams = input('post.');
    }

    /**
     * Description: 验证参数是否存在
     * User: 郭玉朝
     * CreateTime: 2018/10/10 下午5:19
     */
    public function checkParams($condition) {
        $oneFirst = []; $twoFirst = [];
        foreach ($condition as $value) {
            is_array($value)?array_push($twoFirst, $value):array_push($oneFirst, $value);
        }
        // 验证一维数组
        $result = array_diff_key(array_flip($oneFirst), $this->allParams);
        if (!empty($result)) {
            return json_encode(array_keys($result), JSON_UNESCAPED_UNICODE);
        }
        // 验证二维数组
        foreach ($twoFirst as $key => $value) {
            foreach ($value as $checkKey => $checkValue) {
                if (!isset($this->allData[$checkKey])) return json_encode([$checkKey], JSON_UNESCAPED_UNICODE);
                $result = array_diff_key(array_flip($checkValue), $this->allParams[$checkKey]);
                if (!empty($result)) {
                    return json_encode(array_keys($result, JSON_UNESCAPED_UNICODE));
                }
            }
        }
        return true;
    }
}