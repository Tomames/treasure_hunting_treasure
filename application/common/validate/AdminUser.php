<?php 


namespace app\common\validate;
 
use think\Validate;
 
class AdminUser extends Validate
{
    protected $rule = [
        'username' => 'require|token',
        'password' => 'require',
        // '__token__' => 'require|token'
    ];
    
    protected $message = [
        'username.require' => '用户名必须填写！',
        'password.require' => '密码必须填写！',
        'username.token' => '非法操作！',
        // '__token__.require'  => '令牌必须填写！',
        // '__token__.token'  => '非法操作！',
    ];

    protected $scene = [
    	'login' => ['username', 'password'],
    ];
    
}