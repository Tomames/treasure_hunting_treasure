<?php

namespace app\common\model;

use think\Model;

class TypeModel extends Model
{
    protected $table = "xqb_article_type";

    protected $type = ['add_time' => 'timestamp'];

    public function article()
    {
    	return $this->hasMany('ArticleModel');
    }

}
