<?php
namespace app\validate;

use think\Validate;

class User extends Validate
{
    //判断
    protected $rule = [
        'user_name|学员姓名'   => 'require',
        'email|邮箱'         => 'require|email|unique:user',
        'password|密码'      => 'require|length:6,20',
        'repassworld|确认密码' => 'require|confirm:password',
        'code|验证码'         => 'require',

    ];
    //添加学员场景验证
    public function sceneAdd()
    {

        return $this->only(['user_name', 'password', 'email', 'repassworld']);
    }
    //重置密码
    public function sceneEditPassword()
    {

        return $this->only(['email', 'password', 'code']);
    }

}
