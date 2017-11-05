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
        //dd(Category::find(1)->articles()->get());
        $category = Category::orderBy('cate_order', 'asc')->get();

        $code = new Tree();
        $data = $code->createTree($category, 'id', 'cate_pid', 'cate_name');
        $path = ['module'=> 'category', 'action'=> 'index'];

        return view('admin.category.index', compact('data', 'path'));
    }

    public function create(){
        $data = Category::where('cate_pid', 0)->get();
        $path = ['module'=> 'category', 'action'=> 'add'];

        return view('admin.category.add', compact('data', 'path'));
    }

    public function store(Request $request){
        //dd(Input::all());
        //$input = Input::except('_token');
        //dd($request->all());
        //dd($request->input());

        $this->validate($request, [
            'cate_name' => 'required|unique:category',
            'cate_order' => 'integer|between:0,255',
        ]);

        $res = Category::create($request->all());
        if ($res){
            return redirect('admin/category');
        }else{
            return back()->withErrors(['errormsg'=> '添加失败']);
        }
    }

    public function destroy(Request $request, $id){
        $cate = Category::find($id);
        $res = $cate->delete();
        if ($res){
            Category::where('cate_pid', $id)->update(['cate_pid'=>$cate->cate_pid]);
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

        return $data;
    }

    public function edit($id){
        $result = Category::findOrFail($id);
        $data = Category::where('cate_pid', 0)->get();
        $path = ['module'=> 'category', 'action'=> 'edit'];

        return view('admin.category.edit', compact('result','data', 'path'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'cate_name' => 'required|unique:category,cate_name,'.$id,
            'cate_order' => 'integer|between:0,255',
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

}
