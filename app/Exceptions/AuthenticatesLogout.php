<?php
/**
 * Created by PhpStorm.
 * User: Mr.Huang
 * Date: 2017/10/25
 * Time: 14:12
 */

namespace App\Extensions;

use Illuminate\Http\Request;

trait AuthenticatesLogout
{
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->forget($this->guard()->getName());

        $request->session()->regenerate();

        return redirect('/');
    }
}