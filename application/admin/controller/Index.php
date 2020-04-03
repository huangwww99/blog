<?php
namespace app\admin\controller;

use app\model\Article as articleModel;
use app\model\Comment as commentModel;
use app\model\Hist as histModel;
use app\model\User as userModel;
use think\Controller;

class Index extends Base
{

    public function index()
    {
        //查询用户总数
        $user    = new userModel();
        $userSum = $user->where('delete_time', 0)->count();
        //查询文章浏览量
        $article    = new articleModel();
        $articleSum = $article->sum('look');
        //查询比昨日新增浏览量
        $hist          = new histModel();
        $yesterDayHist = $hist->findSumHist();
        //查询比昨日新增的评论数以及全部评论数
        $comment          = new commentModel();
        $yesterDaycomment = $comment->index();
        $this->assign('userSum', $userSum);
        $this->assign('yesterDayHist', $yesterDayHist);
        $this->assign('yesterDaycomment', $yesterDaycomment);
        $this->assign('articleSum', $articleSum);
        return $this->fetch();
    }
}
