<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends AdminController
{
    //
    public function index()
    {
        //dd('用户名：'.auth('admin')->user()->name);
        //$user = Auth::user();
        //dd($user);
        /*echo auth('admin')->getName();
        echo "<br>";
        echo auth()->guard('admin')->getName();
        echo "<br>";*/
        //dd(session());
        return view('admin.index');
    }

    public function info()
    {
        return view('admin.info');
    }
}
