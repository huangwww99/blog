<?php
namespace app\admin\controller;

use app\model\System as systemModel;
use think\Controller;

class Base extends Controller
{

    public function initialize()
    {
        $system = new systemModel();
        $footer = $system->find();
        $this->assign('footer', $footer);

        return $this->fetch();
    }
}
