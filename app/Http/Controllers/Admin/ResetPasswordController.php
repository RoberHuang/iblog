<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    //
    use ResetsPasswords;

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    /**
     * 重写重置密码表单
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('admin.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    /**
     * 自定义认证看守器
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * 自定义密码 Broker
     */
    public function broker()
    {
        return Password::broker('admins');
    }
}
