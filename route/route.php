<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//前台路由
//首页
Route::rule('cateArticle/:id', 'index/index/index', 'get');
Route::rule('/', 'index/index/index', 'get');

//热点
Route::rule('hot', 'index/index/hot', 'get');

Route::group('index', function () {
    //用户
    Route::group('user', function () {
        Route::rule('login', 'index/user/login', 'get');
        Route::rule('logined', 'index/user/logined', 'post');
        Route::rule('forget', 'index/user/forget', 'get');
        Route::rule('send', 'index/user/send', 'post');
        Route::rule('editPassword', 'index/user/editPassword', 'post');
    });
    //文章
    Route::group('article', function () {
        Route::rule('detail/:id', 'index/article/detail', 'get');

    });
});

//后台路由
Route::group('admin', function () {
    //首页
    Route::rule('/', 'admin/admin/login', 'get|post');

    Route::group('admin', function () {
        Route::rule('login', 'admin/admin/login', 'get');
        Route::rule('logined', 'admin/admin/logined', 'post');
        Route::rule('singOut', 'admin/admin/singOut', 'get|post');
        Route::rule('admin', 'admin/index/index', 'get|post');
    });
    Route::group('user', function () {
        Route::rule('lis', 'admin/user/lis', 'get|post');
        Route::rule('add', 'admin/user/add', 'post');
        Route::rule('edit/:id', 'admin/user/edit', 'get|post');
        Route::rule('postEdit', 'admin/user/postEdit', 'post');
        Route::rule('del', 'admin/user/del', 'post');
        Route::rule('detail', 'admin/user/detail', 'get');
        Route::rule('info', 'admin/user/info', 'get|post');

    });
    //文章
    Route::group('article', function () {
        Route::rule('index', 'admin/article/index', 'get|post');
        Route::rule('add', 'admin/article/add', 'get|post');
        Route::rule('addArticle', 'admin/article/addArticle', 'get|post');
        Route::rule('edit/:id', 'admin/article/edit', 'get|post');
        Route::rule('editEd', 'admin/article/editEd', 'get|post');
        Route::rule('del/:id', 'admin/article/del', 'get|post');
        Route::rule('info', 'admin/article/info', 'get|post');
        Route::rule('look', 'admin/article/look', 'get|post');
        Route::rule('analysis/:id', 'admin/article/analysis', 'get|post');
        Route::rule('echartDetail', 'admin/article/echartDetail', 'post');

    });
    //浏览量
    Route::group('hist', function () {
        Route::rule('index', 'admin/hist/index', 'get|post');
        Route::rule('index', 'admin/hist/echart', 'get|post');

    });
    //评论
    Route::group('comment', function () {
        Route::rule('index', 'admin/comment/index', 'get|post');
        Route::rule('comment', 'index/comment/add', 'get|post');
        Route::rule('detail/:id', 'admin/comment/detail', 'get|post');
    });
    Route::group('system', function () {
        Route::rule('index', 'admin/system/index', 'get|post');
        Route::rule('set', 'admin/system/set', 'get|post');
    });
});
