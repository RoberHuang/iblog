<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

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

    public function showChangeForm(){
        return view('admin.auth.passwords.change');
    }

    public function changePassword(Request $request){
        //dd($request->input());《==》dd(Input::all());

        //校验方式1
        /*$message = [
            'password_o.required' => '请输入原密码',
            'password.required' => '请输入密码',
            'password.between' => '新密码必须在6-20位之间',
        ];
        $res = Validator::make(Input::all(), [
            'password_o' => 'required',
            'password' => 'required|between:6,20|confirmed',
        ], $message);
        if (!$res->passes()){
            return back()->withErrors($res);
        }*/

        //校验方式2
        $this->validateInput($request);

        //$admin = Admin::first();
        $admin = Admin::find(1);

        if (!Hash::check($request->input('password_o'), $admin->password)){
            return back()->withErrors(['password_o'=> '原密码错误']);
        }

        //$admin->password = Hash::make($request->input('password'));
        $admin->password = bcrypt($request->input('password'));
        $admin->update();

        //return redirect('admin/info');
        return back()->withErrors(['success'=> '密码修改成功']);
    }

    public function validateInput(Request $request){
        $this->validate($request, [
            'password_o' => 'required',
            'password' => 'required|between:6,20|confirmed',
        ]);
    }
}
