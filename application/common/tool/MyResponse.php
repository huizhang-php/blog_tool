<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/10 下午5:29
 * Description:
 */
namespace app\common\tool;

trait MyResponse {

    /**
     * Description: 发送数据
     * User: 郭玉朝
     * CreateTime: 2018/10/10 下午5:31
     * @param int $code 200:请求成功 400:请求失败 401:参数错误
     * @param string $msg
     * @param array $data
     * @param array $otherParams
     * @return string
     */
    public function sendMsg($code=200, $msg='请求成功', $data=[], $otherParams=[]) {
        $returnData = [
                'code'  => $code,
                'msg'   => $msg,
                'data'  => $data
            ];
        if (!empty($otherParams)) {
            $returnData = array_merge($returnData, $otherParams);
        }
        $returnData = json_encode($returnData, JSON_UNESCAPED_UNICODE);
        return $returnData;
    }

}