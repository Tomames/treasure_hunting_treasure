<?php 


namespace app\common\validate;
 
use think\Validate;
 
class Type extends Validate
{
    protected $rule = [
        'name' => 'require|unique:article_type|token',
    ];
    
    protected $message = [
        'name.require' => '分类名必须填写！',
        'name.unique' => '已有该分类！',
        'name.token' => '非法操作，请刷新重试！',
    ];

    protected $scene = [
        'save' => ['name'],
    	'update' => ['name' => 'require|token|unique:article_type,name^id'],
    ];
    
}