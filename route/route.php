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

/**
 * 后台路由
 */
Route::group('admin', function () {
    //首页
    Route::group('/', function () {
        //登入页面跳转
        Route::rule('/', 'admin/admin/index', 'get|post');
        Route::rule('login', 'admin/admin/login', 'get|post');

    });
    Route::rule('/', 'admin/admin/index', 'get|post');

});
