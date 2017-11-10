<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class ConfigController extends AdminController
{
    //
    public function index(){
        //dd(Category::find(1)->articles()->get());
        //$category = Category::orderBy('cate_order', 'asc')->get();

        $data = [];
        $path = ['module'=> 'config', 'action'=> 'index'];

        return view('admin.config.index', compact('data', 'path'));
    }
}
