<?php 


namespace app\common\validate;
 
use think\Validate;
 
class AdminUser extends Validate
{
    protected $rule = [
        'username' => 'require|token',
        'password' => 'require',
    ];
    
    protected $message = [
        'username.require' => '账户必须填写！',
        'password.require' => '密码必须填写！',
        'username.token' => '非法操作，请刷新重试！',
    ];

    protected $scene = [
    	'login' => ['username', 'password'],
    ];
    
}