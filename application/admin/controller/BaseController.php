<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/12 上午11:08
 * Description:
 */

namespace app\admin\controller;

use think\Controller;

class BaseController extends Controller {

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        if (!session('?admin_id')) {
            return $this->redirect('login/login');
        }
        parent::__construct();
    }

}