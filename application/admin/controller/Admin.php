<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/6
 * Time: 14:27
 */
namespace app\admin\controller;
use app\common\model\UserModel;

class Admin extends Base{

    public function index(){
        return view();
    }


    public function userManager(){
        $where = [];
        $userModel = new UserModel();
        $userList = $userModel->getUserList($where,1);
        $this->assign("userList",$userList);
        return view();
    }

}