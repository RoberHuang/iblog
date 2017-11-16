<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Admin\Article;
use App\Http\Model\Admin\Link;
use Illuminate\Http\Request;

class IndexController extends CommonController
{
    //
    public function index(){
        //点击量最高的6篇文章（站长推荐）
        $pics = Article::orderBy('article_frequency','desc')->take(6)->get();
        //图文列表5篇（带分页）
        $data = Article::orderBy('created_at','desc')->paginate(5);

        //友情链接
        $links = Link::orderBy('link_order','asc')->get();

        return view('home.index',compact('pics','data','links'));
    }

    public function cate($cate_id)
    {
        //图文列表4篇（带分页）
        $data = Article::where('id',$cate_id)->orderBy('created_at','desc')->paginate(4);

        //查看次数自增
        Category::where('id',$cate_id)->increment('cate_frequency');

        //当前分类的子分类
        $submenu = Category::where('cate_pid',$cate_id)->get();

        $field = Category::find($cate_id);
        return view('home.list',compact('field','data','submenu'));
    }

    public function article($art_id)
    {
        $field = Article::Join('category','articles.cate_id','=','category.id')->where('articles.id',$art_id)->first();

        //查看次数自增
        Article::where('id',$art_id)->increment('article_frequency');

        $article['pre'] = Article::where('id','<',$art_id)->orderBy('id','desc')->first();
        $article['next'] = Article::where('id','>',$art_id)->orderBy('id','asc')->first();

        $data = Article::where('cate_id',$field->cate_id)->orderBy('id','desc')->take(6)->get();

        return view('home.new',compact('field','article','data'));
    }
}
