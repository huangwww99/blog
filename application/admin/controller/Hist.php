<?php
namespace app\admin\controller;

use app\model\Article as articleModel;
use app\model\Hist as histModel;
use think\Controller;

class Hist extends Base
{

    public function index()
    {
        $hist = new HistModel();

        //调用articleModel的查询文章方法
        $article = new articleModel();
        $result  = $article->look();
        $page    = $result->render();
        // 模板变量赋值
        $this->assign('page', $page);
        $this->assign('result', $result);
        $resul = $hist->echart();

        $this->assign('resul', $resul);
        return $this->fetch();
    }
    /**
     * echart图标统计文章浏览量--饼状图
     */
    public function echart()
    {

        echo json_encode($resul);
    }
}
