<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Admin\Article;
use App\Http\Model\Admin\Nav;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class CommonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $hot = Article::orderBy('article_frequency', 'desc')->take(5)->get();
        $new = Article::orderBy('created_at', 'desc')->take(8)->get();
        $nav = Nav::all();

        View::share('hot', $hot);
        View::share('new', $new);
        View::share('nav', $nav);
    }
}
