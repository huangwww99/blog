<?php
namespace app\admin\controller;

use app\model\Article as articleModel;
use app\model\Comment as commentModel;
use app\model\Hist as histModel;
use app\model\Menu as menuModel;
use Request;
use think\Controller;

class Article extends Base
{

    public function index()
    {
        $data    = Request::param();
        $article = new articleModel();
        $result  = $article->index($data);
        $this->assign('result', $result);
        $page = $result->render();
        $this->assign('page', $page);

        return $this->fetch();
    }
    /**
     * 添加文章
     */
    public function add()
    {
        $menu     = new menuModel();
        $listMenu = $menu->lis();
        $this->assign('listMenu', $listMenu);
        return $this->fetch();
    }
    /**
     * 添加文章提交
     */
    public function addArticle()
    {
        $data            = Request::param();
        $data['content'] = htmlspecialchars_decode($data['content']);

        $article = new articleModel();
        $result  = $article->addArticle($data);
        return $this->fetch();
    }
    /**
     * 修改文章
     */
    public function edit()
    {
        $id      = Request::param('id');
        $article = new articleModel();
        $result  = $article->edit($id);
        $this->assign('result', $result);
        return $this->fetch();
    }
    /**
     * 修改文章
     */
    public function editEd()
    {
        $data    = Request::param();
        $article = new articleModel();
        $result  = $article->editEd($data);

        return $this->fetch();
    }
    /**
     * 删除文章
     */
    public function del()
    {
        $id      = Request::param('id');
        $article = new articleModel();
        $result  = $article->del($id);
        return $this->redirect('admin/article/index');
    }
    /**
     * 查询文章总数表格
     */
    public function info()
    {

        $article = new articleModel();
        $result  = $article->look();
        $page    = $result['pageArticle']->render();
        $this->assign('page', $page);
        $this->assign('result', $result);
        // 模板变量赋值

        return $this->fetch();
    }
    /**
     * 查询文章访问量图标
     */
    public function look()
    {
        $article = new articleModel();
        $result  = $article->look();

        echo json_encode($result['sumArticle']);
    }
    /**
     * 文章详情数据分析
     */
    public function analysis()
    {
        //接收前台产值
        $id = Request::param('id');
        $this->assign('id', $id);
        return $this->fetch();
    }
    /**
     * 绘制文章详情数据分析echart图表
     */
    public function echartDetail()
    {
        //接收前台产值
        $id      = Request::param('id');
        $hist    = new HistModel();
        $sumHist = $hist->oneArticleHist($id);

        $comment    = new commentModel();
        $sumComment = $comment->oneArticleComment($id);
        $data       = [
            'sumHist'    => $sumHist,
            'sumComment' => $sumComment,
        ];
        echo json_encode($data);

    }

}
