<?php
namespace app\admin\controller;

use app\model\Admin as adminModel;
use Request;
use think\Controller;

class Admin extends Base
{

    public function login()
    {
        return $this->fetch();
    }
    /**
     * 登录
     */
    public function logined()
    {

        $data   = Request::param();
        $admin  = new adminModel();
        $result = $admin->logined($data);
        return $this->fetch();
    }
    /**
     * 退出登录
     */
    public function singOut()
    {

        $admin  = new adminModel();
        $result = $admin->singOut();
        return $this->fetch();
    }
}
