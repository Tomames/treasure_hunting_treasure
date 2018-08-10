<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\model\TypeModel;

class Type extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $types = TypeModel::all([]);
        $this->assign("types",$types);
        return view();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return view();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $data = Request::instance()->param();
        $result = $this->validate($data,'Type.save');
        if(true !== $result){
            return $this->makeJson(400, $result);
        }
        $time = time();
        $type = new TypeModel([
            'name' => $data['name'],
            'state' => $data['state'],
            'add_time' => $time,
            'update_time' => $time,
        ]);
        if ($type->save()) {
            return $this->makeJson(200, '');
        } else {
            return $this->makeJson(403, '添加失败！');
        }

    }


    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $id = Request::instance()->param("id");
        $type = TypeModel::find($id);
        $this->assign("type",$type);
        return view();
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        $data = Request::instance()->param();
        $result = $this->validate($data,'Type.update');
        if(true !== $result){
            return $this->makeJson(400, $result);
        }
        if ($data['id'] != $id) {
            return $this->makeJson(401, '未知错误！');
        }
        if (!$type = TypeModel::get($id)) {
            return $this->makeJson(402, '没有这条数据！');
        }
        $db = $type->save([
            'name' => $data['name'],
            'state' => $data['state'],
            'update_time' => time(),
        ],['id' => $id]);
        if ($db) {
            return $this->makeJson(200, '');
        } else {
            return $this->makeJson(403, '编辑失败！');
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        if (is_numeric($id)) {
            $id = [$id];
        }
        array_walk($id, 'intval');
        $db = TypeModel::destroy($id);
        if ($db) {
            return $this->makeJson(200, '');
        } else {
            return $this->makeJson(403, '删除失败！');
        }
    }
}
