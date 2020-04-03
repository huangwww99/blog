<?php
namespace app\admin\controller;

use app\model\Article as articleModel;
use app\model\Comment as commentModel;
use Request;
use think\Controller;

class Comment extends Base
{
    public function index()
    {
        $data        = Request::param();
        $comment     = new commentModel();
        $article     = new articleModel();
        $dataArticle = $article->getArticleAndComment($data);
        $page        = $dataArticle->render();
        $this->assign('page', $page);
        $this->assign('dataArticle', $dataArticle);
        return $this->fetch();
    }
    public function detail()
    {
        $data       = Request::param();
        $comment    = new commentModel();
        $article    = new articleModel();
        $oneArticle = $article->getArticleAndComment($data);
        $this->assign('oneArticle', $oneArticle);
        return $this->fetch();
    }
}
