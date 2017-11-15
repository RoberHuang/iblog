<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

class IndexController extends CommonController
{
    //
    public function index(){
        //点击量最高的6篇文章（站长推荐）
        $pics = Article::orderBy('art_view','desc')->take(6)->get();
        //图文列表5篇（带分页）
        $data = Article::orderBy('art_time','desc')->paginate(5);

        //友情链接
        $links = Links::orderBy('link_order','asc')->get();

        return view('home.index',compact('pics','data','links'));
    }
}