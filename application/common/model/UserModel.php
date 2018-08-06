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
        return $this->where($where)->paginate($page);
    }



}