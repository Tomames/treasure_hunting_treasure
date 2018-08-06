<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/6
 * Time: 15:34
 */
namespace app\common\model;
use think\Model;

class UserModel extends Model{
    protected $table = "xqb_user";

    public function getUserList($where,$page){
        return $this->where($where)->select();
    }

    public function findUser($where){
        return $this->where($where)->find();
    }

    public function saveUser($userInfo,$where){
        return $this->where($where)->update($userInfo);
    }

    public function delUser($id){
        return $this->where(['id'=>$id])->delete();
    }


    public function makePassword($password){
        return md5($password);
    }

}