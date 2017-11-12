<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin\Nav;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NavController extends AdminController
{
    //
    public function index(){
        $data = Nav::orderBy('nav_order', 'asc')->get();
        $path = ['module'=> 'nav', 'action'=> 'index'];
        return view('admin.nav.index', compact('data', 'path'));
    }

    public function create(){
        $path = ['module'=> 'nav', 'action'=> 'add'];
        return view('admin.nav.add', compact('path'));
    }

    public function store(Request $request){
        $message = [
            'nav_name.required' => 'required',
            'nav_url.required' => 'required',
            'nav_order.integer' => '必须是0到255之间的整数',
            'nav_order.between' => '必须是0到255之间的整数',
        ];
        $rule = [
            'nav_name' => 'required',
            'nav_url' => 'required',
            'nav_order' => 'integer|between:0,255',
        ];
        $res = Validator::make($request->all(), $rule, $message);

        if (!$res->passes()){
            return [
                'status' => '1',
                'errors' => $res->errors()->first()
            ];
        }

        $result = Nav::create($request->all());
        if ($result){
            return [
                'status' => '0',
                'errors' => trans('admin/common.add_success')
            ];
        }else{
            return [
                'status' => '1',
                'errors' => trans('admin/common.add_fail')
            ];
        }
    }

    public function edit($id){
        $result = Nav::findOrFail($id);
        $path = ['module'=> 'nav', 'action'=> 'edit'];

        return view('admin.nav.edit', compact('result', 'path'));
    }

    public function update(Request $request, $id){
        $message = [
            'nav_name.required' => 'required',
            'nav_url.required' => 'required',
            'nav_order.integer' => '必须是0到255之间的整数',
            'nav_order.between' => '必须是0到255之间的整数',
        ];
        $rule = [
            'nav_name' => 'required',
            'nav_url' => 'required',
            'nav_order' => 'integer|between:0,255',
        ];

        $res = Validator::make($request->all(), $rule, $message);
        if (!$res->passes()){
            return [
                'status' => '1',
                'errors' => $res->errors()->first()
            ];
        }

        $nav = Nav::find($id);
        if (is_null($nav)){
            return [
                'status' => '1',
                'errors' => trans('admin/common.data_abnormal')
            ];
        }

        $result = $nav->update($request->all());
        if ($result){
            return [
                'status' => '0',
                'errors' => trans('admin/common.edit_success')
            ];
        }else{
            return [
                'status' => '1',
                'errors' => trans('admin/common.edit_fail')
            ];
        }
    }

    public function destroy($id){
        $result = Nav::find($id);
        if (is_null($result)){
            return [
                'status' => '1',
                'errors' => trans('admin/common.data_abnormal')
            ];
        }
        if ($result->delete()){
            return [
                'status' => '0',
                'errors' => trans('admin/common.operation_success')
            ];
        }else{
            return [
                'status' => '1',
                'errors' => trans('admin/common.operation_fail')
            ];
        }
    }

    public function setOrder(Request $request){
        $message = [
            'nav_order.integer' => '必须是0到255之间的整数',
            'nav_order.between' => '必须是0到255之间的整数',
        ];
        $rule = [
            'nav_order' => 'integer|between:0,255',
        ];

        $res = Validator::make($request->all(), $rule, $message);
        if (!$res->passes()){
            return [
                'status' => '1',
                'errors' => $res->errors()->first()
            ];
        }

        $nav = Nav::find($request->input('id'));
        if (is_null($nav)){
            return [
                'status' => '1',
                'errors' => trans('admin/common.data_abnormal')
            ];
        }

        $nav->nav_order = $request->input('nav_order');
        $result = $nav->update();
        if ($result){
            return [
                'status' => '0',
                'errors' => trans('admin/common.operation_success')
            ];
        }else{
            return [
                'status' => '1',
                'errors' => trans('admin/common.operation_fail')
            ];
        }
    }
}
