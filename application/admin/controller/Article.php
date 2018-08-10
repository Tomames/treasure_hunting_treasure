<?php

namespace app\admin\controller;

use app\common\model\ArticleModel;
use think\Request;

class Article extends Base{

	protected  $articleModel = null;

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->articleModel = new ArticleModel();
    }

    public function index(){
    	$where = [];
    	$articles = $this->articleModel->getArticleList($where,1);
    	$this->assign("articles",$articles);
        return view();
    }

    public function create()
    {
    	return view();
    }
}