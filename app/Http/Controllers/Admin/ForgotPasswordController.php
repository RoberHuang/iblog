<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

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

}
