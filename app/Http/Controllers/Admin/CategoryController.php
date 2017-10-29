<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin\Category;
use Illuminate\Http\Request;
use resources\org\Tree;

class CategoryController extends AdminController
{
    //
    public function index(){
        $category = Category::all();

        $code = new Tree();
        $data = $code->createTree($category, 'cate_id', 'cate_pid', 'cate_name');

        return view('admin.category.index')->with('data', $data);
    }

    public function create(){
        return view('admin.category.add');
    }

    public function store(){

    }

    public function destroy(Request $request){

    }

    public function edit(Request $request){
        return view('admin.category.edit');
    }

    public function update(Request $request){

    }

    public function show(Request $request){

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
