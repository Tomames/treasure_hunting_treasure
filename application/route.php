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
    '/user/register' =>'home/Index/doRegister',
    '/user/login' =>'home/Index/dologin',

    '/user'=>'home/User/user',

    '/articleLocation'=>'home/User/articleLocation',
    '/articleList'=>'home/User/articleList',
    '/articleFrom'=>'home/User/articleFrom',
    '/addTarget'=>'home/User/addTarget',


//    后台

    //登录相关
    '/admin/login'=>'admin/Index/login',
    '/admin/admin/login' => 'admin/Index/dologin',
    '/admin/logout' => 'admin/Index/logout',

    //后台首页
    '/admin/index'=>'admin/Admin/index',

    //资讯管理
    '/admin/article' => 'admin/Article/index',
    '/admin/article/create' => 'admin/Article/create',

    //资讯分类
    '/admin/type' => 'admin/Type/index',
    '/admin/type/create' => 'admin/Type/create',
    '/admin/type/save' => 'admin/Type/save',
    '/admin/type/edit' => 'admin/Type/edit',
    '/admin/type/update' => 'admin/Type/update',
    '/admin/type/delete' => 'admin/Type/delete',


    //会员管理
    'admin/user/list'=>'admin/UserManager/uList',
    'admin/user/add'=>'admin/UserManager/add',
    'admin/user/save'=>'admin/UserManager/save',
    'admin/user/del'=>'admin/UserManager/del',




];
