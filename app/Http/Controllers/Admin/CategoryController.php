<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use resources\org\Tree;

class CategoryController extends AdminController
{
    //
    public function index(){
        $category = Category::orderBy('cate_order', 'asc')->get();

        $code = new Tree();
        $data = $code->createTree($category, 'id', 'cate_pid', 'cate_name');

        return view('admin.category.index')->with('data', $data);
    }

    public function create(){
        $data = Category::where('cate_pid', 0)->get();
        return view('admin.category.add', compact('data'));
    }

    public function store(Request $request){
        //dd(Input::all());
        //$input = Input::except('_token');
        //dd($request->all());
        //dd($request->input());

        $this->validate($request, [
            'cate_name' => 'required|unique:category',
        ]);

        $res = Category::create($request->all());
        if ($res){
            return redirect('admin/category');
        }else{
            return back()->withErrors(['errormsg'=> '添加失败']);
        }
    }

    public function destroy(Request $request){

    }

    public function edit($id){
        $result = Category::findOrFail($id);
        $data = Category::where('cate_pid', 0)->get();
        return view('admin.category.edit', compact('result','data'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'cate_name' => 'required',
        ]);
        $input = Input::except('_token', '_method');

        $res = Category::where('id', $id)->update($input);
        if ($res){
            return redirect('admin/category');
        }else{
            return back()->withErrors(['errormsg'=> '添加失败']);
        }
    }

    public function show(Request $request){

    }

    public function setOrder(Request $request){
        $cate = Category::find($request->input('id'));

        if (is_null($cate)){
            $data = [
                'status' => '1',
                'msg' => '数据异常',
            ];
        }else{
            $cate->cate_order = $request->input('cate_order');
            $re = $cate->update();

            if ($re){
                $data = [
                    'status' => '0',
                    'msg' => '操作成功',
                ];
            }else{
                $data = [
                    'status' => '1',
                    'msg' => '操作失败',
                ];
            }
        }

        return $data;
    }

    /*protected function getTree($data, $pid=0){
        static $array = array();
        foreach ($data as $key=>$value){
            if ($value->cate_pid==$pid){
                $array[] = $data[$key];
                unset($data[$key]);
                $this->getTree($data, $value->cate_id);
            }
        }
        return $array;
    }*/
}
