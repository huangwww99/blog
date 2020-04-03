<?php
namespace app\validate;

use think\Validate;

class User extends Validate
{
    //判断
    protected $rule = [
        'user_name|管理员账号' => 'require',
        'password|密码'     => 'require|length:6,20',

    ];
    //登入验证场景
    public function sceneLogin()
    {

        return $this->only(['user_name', 'password']);
    }

}
