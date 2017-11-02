<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin\Article;
use App\Http\Model\Admin\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use resources\org\Tree;

class ArticleController extends AdminController
{
    //
    public function index()
    {
        //dd(Article::find(1)->publish_at);
        //dd(Article::find(2)->category()->get());
        $data = Article::all();
        return view('admin.article.index', compact('data'));
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

        $message = [
            'cate_id.required' => '请选择分类',
            'article_title.required' => '请输入标题',
            'article_content.required' => '内容不能为空',
        ];
        $rule = [
            'cate_id' => 'required',
            'article_title' => 'required',
            'article_content' => 'required',
        ];

        $res = Validator::make($request->input(), $rule, $message);

        if (!$res->passes()){
            return [
                'status' => 1,
                'result' => $res->errors()->first(),
            ];
        }

        //验证方式2
        /*$this->validate($request, [
            'cate_id' => 'required',
            'article_title' => 'required',
            'article_content' => 'required',
        ]);*/

        //Article::create(array_merge(['user_id'=>\Auth::user()->id],$request->all()));

        $res = Article::create($request->all());
        if ($res){
            return [
                'status' => 0,
                'result' => '添加成功',
            ];
        }else{
            return [
                'status' => 1,
                'result' => '添加失败',
            ];
        }
    }
}
