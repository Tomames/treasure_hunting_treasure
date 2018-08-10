<?php 


namespace app\common\validate;
 
use think\Validate;
 
class User extends Validate
{
    protected $rule = [
        'phone' => 'require|token|mobile|unique:users',
        'password' => 'require|password',
        'repassword'=>'require|confirm:password',
    ];
    
    protected $message = [
        'phone.require' => '手机号码必须填写！',
        'phone.mobile'  => '手机格式错误',
        'phone.token' => '非法操作，请刷新重试！',
        'phone.unique'  => '手机号已经存在',
        'password.require' => '密码必须填写！',
        'password.password' =>'密码格式6-15个字母数字组合',
        'repassword.require' => '确认密码必须填写！',
        'repassword.confirm' => '确认密码不正确！',
    ];

    protected $regex = [
        'mobile'    => '/^1[3|4|5|7|8|9]\d{9}$/',
        'password'  => '/^[\w]{6,15}$/'
    ];

    protected $scene = [
        'register' => ['phone', 'password','repassword'],
    	'login' => ['phone' => 'require|token|mobile', 'password'],
    ];
    
}