<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

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
        return view('admin.index');
    }
}
