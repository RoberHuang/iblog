<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin\Category;
use Illuminate\Http\Request;
use resources\org\Tree;

class ArticleController extends AdminController
{
    //
    public function index()
    {
        dd(1);
        return view('admin.article.index');
    }

    public function create(){
        $category = Category::orderBy('cate_order', 'asc')->get();

        $code = new Tree();
        $data = $code->createTree($category, 'id', 'cate_pid', 'cate_name');

        return view('admin.article.add', compact('data'));
    }
}
