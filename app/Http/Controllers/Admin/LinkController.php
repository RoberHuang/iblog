<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LinkController extends AdminController
{
    //
    public function index()
    {
        $data = Link::orderBy('link_order', 'asc')->get();
        $path = ['module'=> 'link', 'action'=> 'index'];
        return view('admin.link.index', compact('data', 'path'));
    }

    public function create(){
        $path = ['module'=>'link', 'action'=> 'add'];
        return view('admin.link.add', compact('path'));
    }

    public function store(Request $request){
        $message = [
            'cate_id.required' => '请选择分类',
            'article_title.required' => '请输入标题',
            'article_content.required' => '内容不能为空',
            'link_order.integer' => '必须是0到255之间的整数',
            'link_order.between' => '必须是0到255之间的整数',
        ];
        $rule = [
            'link_name' => 'required',
            'link_url' => 'required',
            'link_title' => 'required',
            'link_order' => 'integer|between:0,255',
        ];

        $res = Validator::make($request->input(), $rule, $message);
        if (!$res->passes()){
            return [
                'status' => 1,
                'result' => $res->errors()->first(),
            ];
        }

        $result = Link::create($request->all());
        if ($result){
            return [
                'status' => 0,
                'result' => '新增成功'
            ];
        }else{
            return [
                'status' => 1,
                'result' => '新增失败'
            ];
        }
    }

    public function edit($id){
        $result = Link::findOrFail($id);
        $path = ['module'=>'link', 'action'=> 'index'];

        return view('admin.link.edit', compact('result', 'path'));
    }

    public function update(Request $request, $id){
        $message = [
            'link_name.required' => '名称不能为空',
            'link_url.required' => '链接不能为空',
            'link_title.required' => '标题不能为空',
            'link_order.integer' => '必须是0到255之间的整数',
            'link_order.between' => '必须是0到255之间的整数',
        ];
        $rule = [
            'link_name' => 'required',
            'link_url' => 'required',
            'link_title' => 'required',
            'link_order' => 'integer|between:0,255',
        ];

        $res = Validator::make($request->input(), $rule, $message);
        if (!$res->passes()){
            return [
                'status' => 1,
                'result' => $res->errors()->first(),
            ];
        }

        $link = Link::find($id);
        if (is_null($link)){
            return [
                'status' => '1',
                'msg' => '数据异常',
            ];
        }

        $result = $link->update($request->all());
        if ($result){
            return [
                'status' => 0,
                'result' => '修改成功'
            ];
        }else{
            return [
                'status' => 1,
                'result' => '修改失败'
            ];
        }
    }

    public function destroy($id){
        $result = Link::find($id);
        if (is_null($result)){
            return [
                'status' => '1',
                'msg' => '数据异常',
            ];
        }
        if ($result->delete()){
            return [
                'status' => 0,
                'result' => '删除成功'
            ];
        }else{
            return [
                'status' => 1,
                'result' => '删除失败'
            ];
        }
    }

    public function setOrder(Request $request){
        $message = [
            'link_order.integer' => '必须是0到255之间的整数',
            'link_order.between' => '必须是0到255之间的整数',
        ];
        $rule = [
            'link_order' => 'integer|between:0,255',
        ];

        $res = Validator::make($request->input(), $rule, $message);
        if (!$res->passes()){
            return [
                'status' => 1,
                'result' => $res->errors()->first(),
            ];
        }

        $link = Link::find($request->input('id'));
        if (is_null($link)){
            return [
                'status' => '1',
                'result' => '数据异常',
            ];
        }else{
            $link->link_order = $request->input('link_order');
            $result = $link->update();
            if ($result){
                return [
                    'status' => '0',
                    'result' => '操作成功',
                ];
            }else{
                return [
                    'status' => '1',
                    'result' => '操作失败',
                ];
            }
        }


    }
}
