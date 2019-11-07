<?php
namespace app\index\validate;

use think\Validate;

class User extends Validate
{
    protected $rule = [
        'username'  => 'require|max:20|chsAlphaNum',
        'email' => 'email',
        'qq'    => 'number|max:20',
        'phone'    => 'require|length:11|number',
        'zip'  => 'regex:zip',
    ];

    protected $message  =   [
        'username.require' => '名称必须',
        'username.max'     => '名称最多不能超过25个字符',
        'name.chsAlphaNum' => '名称只能是汉字、字母和数字',
        'qq.number'   => 'qq必须是数字',
        'phone.number'   => '手机必须是数字',
        'phone.max'   => '请输入11位手机号',
        'email'        => '邮箱格式错误',
        'zip'  => '与正则表达式不符',
    ];

    protected $regex = [ 'zip' => '\d{6}'];//正则表达式

}