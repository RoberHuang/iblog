<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin\Article;
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

    public function store(Request $request){
        //return back()->withErrors(['cate_type'=>'分类不能为空']);
        //return back()->withErrors(['article_thumb'=>'图片错误']);
        $this->validate($request, [
            'cate_id' => 'required',
            'article_title' => 'required',
            'article_content' => 'required',
        ]);

        //Article::create(array_merge(['user_id'=>\Auth::user()->id],$request->all()));

        $res = Article::create($request->all());
        if ($res){
            return redirect('admin/article');
        }else{
            return back()->withErrors(['errormsg'=> '添加失败']);
        }
    }
}
