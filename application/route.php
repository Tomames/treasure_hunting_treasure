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
use think\Route;

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]' => [
        ':id' => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

//    会员
    '/'=>'home/Index/login',
    '/register'=>'home/Index/register',
    '/user'=>'home/User/user',
    '/articleLocation'=>'home/User/articleLocation',
    '/articleList'=>'home/User/articleList',
    '/articleFrom'=>'home/User/articleFrom',
    '/addTarget'=>'home/User/addTarget',


//    后台
    '/admin/login'=>'admin/Index/login',
    'admin/index'=>'admin/Admin/index',
    'admin/userManager'=>'admin/Admin/userManager',

];
