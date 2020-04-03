<?php
namespace app\admin\controller;

use app\model\Menu as menuModel;
use app\model\System as systemModel;
use Request;
use think\Controller;

class System extends Base
{
    /**
     * 查询网站信息
     * 查询所有导航栏
     */
    public function index()
    {
        $menu   = new menuModel();
        $result = $menu->lis();
        $this->assign('result', $result);
        return $this->fetch();
    }
    /**
     * 跟新网站信息
     */
    public function set()
    {
        $data   = Request::param();
        $system = new systemModel();
        $result = $system->set($data);
        return $this->fetch();
    }

}
