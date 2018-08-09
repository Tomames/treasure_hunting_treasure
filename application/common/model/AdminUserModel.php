<?php

namespace app\common\model;
use think\Model;

class AdminUserModel extends Model{
    protected $table = "xqb_admin_users";
    protected $hidden = ['password', 'remember_token'];

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

    public function encryptPassword($password) {
        $salt =  config('encrypt.salt') ? config('encrypt.salt') : 'xqb';
        return md5($salt.$password);
    }


}