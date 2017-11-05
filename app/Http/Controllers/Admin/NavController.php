<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NavController extends Controller
{
    //
    public function index(){
        $data = [];
        $path = ['module'=> 'nav', 'action'=> 'index'];
        return view('admin.nav.index', compact('data', 'path'));
    }

    public function create(){
        $path = ['module'=> 'nav', 'action'=> 'add'];
        return view('admin.nav.add', compact('path'));
    }

    public function store(Request $request){
        dd($request->input());
    }
}
