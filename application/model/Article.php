<?php
namespace app\model;

use think\db\Query;

class Article extends Common
{
    //关联评论表
    public function comment()
    {
        return $this->hasMany('Comment', 'article_id', 'id');
    }
    /**
     * 文章列表以及查询
     */
    public function index($data)
    {
        $join = [
            ['tp_admin a', 'a.id = art.admin_id'],
        ];
        $field = 'a.id,a.nick_name ,art.*';
        // 使用闭包查询
        $lis = $this
            ->alias('art')
            ->join($join)
            ->field($field)
            ->where('art.delete_time', 0)
            ->where(function (Query $query) use ($data) {

                $title = empty($data['title']) ? '' : $data['title'];
                if (!empty($title)) {

                    $query->where('title', $title);
                }
                $id = empty($data['id']) ? '' : $data['id'];
                if (!empty($title)) {
                    $query->where('menu_id', $id);
                }
            })->paginate(5);

        return $lis;
    }
    /**
     * 添加文章
     */
    public function addArticle($data)
    {
        $data['content'] = htmlspecialchars_decode($data['content']);
        // 过滤post数组中的非数据表字段数据
        $result = $this->allowField(true)->save($data);
        if ($result) {
            return $this->message(200, '添加成功');
        } else {
            return $this->message(400, '添加失败');
        }
    }
    /**
     * 修改文章
     */
    public function edit($id)
    {
        return $result = $this->where('id', $id)->find();
    }
    /**
     * 修改文章
     */
    public function editEd($data)
    {
        $result = $this->allowField(true)->save($data, ['id' => $data['id']]);
        if ($result) {
            return $this->message(200, '修改成功');
        } else {
            return $this->message(400, '修改失败');
        }
    }
    /**
     * 删除文章
     */
    public function del($id)
    {
        $result = $this->where('id', $id)
            ->update(['delete_time' => time()]);

    }
    /**
     * 文章详细根据id查询
     */
    public function detail($data)
    {
        //先查文章，根据文章查询出作者id，根据作者id查询他的所有文章

        // 使用闭包查询
        $likeArticle = $this->where('delete_time', 0)->where('admin_id', $data['admin_id'])->paginate(10);
        return $likeArticle;
    }
    /**
     * 查询文章访问量分页
     */
    public function look($echarts = [])
    {
        //获取当前时间的年月日转化为时间戳
        // $toDay = strtotime(date('y-m-d h:i:s', time()));
        // 获取昨天的时间
        // $yesterDay = strtotime(date("Y-m-d", strtotime("-1 day")));
        //总文章查看数

        //比昨天多的查看数
        $pageArticle = $this->where('delete_time', 0)->paginate(3);

        $sumArticle = $this->where('delete_time', 0)->select();
        $result     = [
            'pageArticle' => $pageArticle,
            'sumArticle'  => $sumArticle,
        ];
        return $result;
    }
    /**
     * 获取文章下对应的评论数量
     */
    public function getArticleAndComment($data = [])
    {
        return $dataArticle = $this->with('comment,comment.user')
            ->alias('art')
            ->where('art.delete_time', 0)
            ->where(function (Query $query) use ($data) {
                $title = empty($data['title']) ? '' : $data['title'];
                if (!empty($title)) {
                    $query->where('title', $title);
                }
                $id = empty($data['id']) ? '' : $data['id'];
                if (!empty($id)) {
                    $query->where('id', $id);
                }

            })->paginate(5);

    }
}
