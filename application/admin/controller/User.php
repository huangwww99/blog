<?php
namespace app\admin\controller;

use app\model\User as userModel;
use Request;
use think\Controller;

class User extends Base
{

    public function lis()
    {
        $data = Request::param();
        $user = new userModel();
        $lis  = $user->lis($data);
        $this->assign('lis', $lis);
        $page = $lis->render();
        $this->assign('page', $page);
        return $this->fetch();

    }
    /**
     * 添加学员信息
     */
    public function add()
    {
        $data   = Request::param();
        $user   = new userModel();
        $restul = $user->add($data);
        return $restul;
    }
    /**
     * 编辑学员信息
     */
    public function edit()
    {
        $id   = Request::param('id');
        $user = new userModel();
        $info = $user->find($id);
        $this->assign('info', $info);
        return $this->fetch();
    }
    /**
     * 提交编辑学员信息
     */
    public function postEdit()
    {
        $data   = Request::param();
        $user   = new userModel();
        $result = $user->postEdit($data);
        return $this->fetch();
    }
    /**
     * 提交编辑学员信息
     */
    public function del()
    {
        $id     = Request::param('id');
        $user   = new userModel();
        $result = $user->del($id);
        return $this->fetch();
    }
    /**
     * 详情统计表
     */
    public function detail()
    {

        return $this->fetch();
    }
    /**
     * 详情统计表
     */
    public function info()
    {
        $user   = new userModel();
        $result = $user->detail();
        echo json_encode($result);

    }

}
