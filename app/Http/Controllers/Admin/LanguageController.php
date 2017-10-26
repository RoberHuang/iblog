<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function setLocale($lang){
        if (array_key_exists($lang, config('app.locales'))) {
            session(['applocale' => $lang]);
        }

        return back()->withInput();
    }
}
