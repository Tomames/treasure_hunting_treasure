<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/6
 * Time: 9:47
 */
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\common\model\AdminUserModel;
use Think\Loader;
use think\Session;

class Index extends Controller {

	protected  $adminUserModel = null;

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->adminUserModel = new AdminUserModel();
    }

    public function login(){
        return view();
    }

    public function dologin(){
		$data = Request::instance()->param();
		$validate = Loader::validate('AdminUser');
		if(!$validate->scene('login')->check($data)){
            $loginError = ['username' => $data['username'], 'error' => $validate->getError()];
            Session::flash('loginError', $loginError);
            $this->redirect('/admin/login');
        }
        $username = $data["username"];
        $password = $this->adminUserModel->encryptPassword($data["password"]);
        $admin = $this->adminUserModel->findUser(['username' => $username, 'password' => $password]);
        if (!$admin) {
            $loginError = ['username' => $data['username'], 'error' => '用户名或密码错误'];
            Session::flash('loginError', $loginError);
            $this->redirect('/admin/login');
        }
        Session::set('admin',$admin->toArray());
        $this->redirect('/admin/index');
    }

    public function logout()
    {
    	Session::delete('admin');
    	$this->redirect('/admin/login');
    }

}