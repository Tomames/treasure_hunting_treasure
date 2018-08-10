<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/6
 * Time: 9:47
 */
namespace app\home\controller;

use think\Controller;
use think\Request;
use think\Session;
use app\common\model\UserModel;

class index extends Controller{

    public function login(){
        return view();
    }


    public function register(){
        return view();
    }

    public function doRegister()
    {
        $data = Request::instance()->param();
        $result = $this->validate($data,'User.register');
        if(true !== $result){
            return $this->makeJson(400, $result);
        }
        $user = new UserModel;
        $time = time();
        $user->data([
        	'phone' => $data['phone'],
        	'passwd' => $user->encryptPassword($data['password']),
        	'reg_time' => $time,
        	'login_times' => 1,
        	'update_time' => $time,
        ]);
        if ($db = $user->save()){
        	$loginUser = $user->findUser(['phone' => $data['phone'], 'passwd' => $user->encryptPassword($data['password'])]);
        	Session::set('user',$loginUser->toArray());
        	return $this->makeJson(200, '');
        } else {
        	return $this->makeJson(403, '注册失败,请联系管理员');
        }
    }

    public function dologin()
    {
    	$data = Request::instance()->param();
        $result = $this->validate($data,'User.login');
        if(true !== $result){
            return $this->makeJson(400, $result);
        }
        $user = new UserModel;
        $loginUser = $user->findUser(['phone' => $data['phone'], 'passwd' => $user->encryptPassword($data['password'])]);
        if ($loginUser) {
        	$loginUser->update(['login_times' => $loginUser->login_times+1, 'update_time' => time()],['id' => $loginUser->id]);
        	Session::set('user',$loginUser->toArray());
	        return $this->makeJson(200, '');
        } else {
        	return $this->makeJson(403, '用户名或密码错误！');
        }
    }

    protected function makeJson($code,$message,$data = null){
        return json(['code'=>$code,'message'=>$message,'data'=>$data]);
    }


}