<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/6
 * Time: 17:32
 */
namespace app\admin\controller;

use app\common\model\UserModel;
use think\Request;

class UserManager extends Base{
    protected  $userModel = null;

    public function __construct(Request $request = null)
    {
        parent::__construct($request);

        $this->userModel = new UserModel();

    }


    public function uList(){
        $where = [];
        $userList = $this->userModel->getUserList($where,1);
        $this->assign("userList",$userList);
        return view();
    }

    public function add(){
        $id = Request::instance()->param("id");
        $user = $this->userModel->findUser(['id'=>$id]);
        $this->assign("user",$user);
        return view();
    }


    public function save(){
        $id = Request::instance()->param("id/d");
        if (empty($id)){
            $this->assign("用户不存在");
        }
        $userInfo = [
            'username'=>Request::instance()->post("username/s"),
            'money'=>Request::instance()->post("money/f")
        ];

        if (Request::instance()->has("password")){
            $userInfo['password'] = $this->userModel->makePassword(Request::instance()->post("password"));
        }

        $res = $this->userModel->saveUser($userInfo,['id'=>Request::instance()->param("id")]);
        if ($res > 0){
            $this->success("保存成功");
        }else{
            $this->error("保存失败");
        }

    }


    public function del(){
        $id = Request::instance()->post("id/d");
        if (empty($id)){
            return $this->makeJson(400,"用户未找到");
        }
        $res = $this->userModel->delUser($id);
        if ($res > 0){
            return $this->makeJson(200,"删除成功");
        }else{
            return $this->makeJson(500,"删除失败");
        }

    }

}