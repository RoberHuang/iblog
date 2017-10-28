<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    //
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest.admin');
    }

    /**
     * 重写视图页面
     */
    public function showLinkRequestForm()
    {
        return view('admin.auth.passwords.email');
    }

    /**
     * 自定义密码 Broker
     */
    public function broker()
    {
        return Password::broker('admins');
    }

}
