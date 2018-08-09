<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/6
 * Time: 14:27
 */
namespace app\admin\controller;

use think\Request;
use app\common\model\AdminUserModel;
use Think\DB;
use Think\Loader;

class Admin extends Base{

	protected  $adminUserModel = null;

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->adminUserModel = new AdminUserModel();
    }

    public function index(){
        return view();
    }

    public function login(){

		$data = Request::instance()->param();
		$validate = Loader::validate('AdminUser');
		if(!$validate->scene('login')->check($data)){
		    return $this->makeJson(4000, $validate->getError());
		}
    	$username = $data["username"];
    	$password = $data["password"];
    	$admin = $this->adminUserModel->findUser(['username' => $username, 'password' => $password]);
    	echo DB::table('xqb_admin_users')->getlastsql();
    	var_dump($admin);

    }

}