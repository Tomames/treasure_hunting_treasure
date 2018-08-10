<?php

namespace app\common\model;
use think\Model;

class ArticleModel extends Model{
    protected $table = "xqb_article";

    public function getArticleList($where,$page = 1){
        return $this->where($where)->select();
    }

    public function findArticle($where){
        return $this->where($where)->find();
    }

    public function saveArticle($ArticleInfo,$where){
        return $this->where($where)->update($ArticleInfo);
    }

    public function delArticle($id){
        return $this->where(['id'=>$id])->delete();
    }

    public function type()
    {
        return $this->belongsTo('ArticleModel');
    }

}