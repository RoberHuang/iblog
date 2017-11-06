<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth.admin:admin');  //冒号后面的admin作为参数传给中间件的$guard变量
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

    //图片上传
    public function uploadify(Request $request){
        if ($request->hasFile('Filedata') && $request->file('Filedata')->isValid()) {
            $file = $request->file('Filedata');

            //获取上传文件的大小
            $size = $file->getSize();
            if($size > 2*1024*1024){
                return [
                    'status' => 1,
                    'result' => '上传文件不能超过2M'
                ];
            }

            //文件类型
            $mimeType = $file->getMimeType();
            $fileTypes = array('image/jpg','image/jpeg','image/gif','image/png');
            if (!in_array($mimeType, $fileTypes)) {
                return [
                    'status' => 1,
                    'result' => '上传文件格式不支持'
                ];
            }

            $realPath = $file->getRealPath();
            if(!$realPath){
                return [
                    'status' => 1,
                    'result' => '非法操作'
                ];
            }

            $today = date('Y-m-d');
            /*$dir = public_path().'/uploads/'.$today;
            if(!is_dir($dir)){
                mkdir($dir);
            }*/

            $extension = $file->extension();
            $newName = date('YmdHis').mt_rand(100,999).".".$extension;
            $store_result = $file->storeAs('uploads/'.$today, $newName, 'uploads');    //第一个参数代表存放目录，第三个参数代表使用的filesystems.php中的uploads配置选项

            return $output = [
                'status' => 0,
                'result' => $store_result
            ];
        }
        return $output = [
            'status' => 1,
            'result' => '未获取到上传文件或上传过程出错'
        ];

        /*$file = Input::file('Filedata');
        if ($file->isValid()){  //是否有效
            //$originalName = $file->getClientOriginalName();  //真实文件名
            //$tmpName = $file->getFileName();  //临时文件名
            //$mimeType = $file->getMimeType();   //image/jpeg
            //$path = $file->move('storage/uploads'); //默认在public/storage/uploads目录下
            //$realPath = $file->getRealPath();   //临时文件的绝对路径

            $extension = $file->getClientOriginalExtension();   //上传文件的后缀
            $fileTypes = array('jpg','jpeg','gif','png'); // File extensions
            if (!in_array($extension, $fileTypes)) {
                return 'Invalid file type.';
            }
            $newName = md5(date('YmdHis').mt_rand(100,999)).".".$extension;
            $path = $file->move(public_path().'/uploads',$newName); //app_path().'storage/uploads'==>app的storage/uploads的目录下

            return $output = [
                'status' => 0,
                'result' => 'uploads/'.$newName
            ];
        }*/
    }

    //session测试
    public function setsession(Request $request){
        $request->session()->put('k1', null);
        session()->put('k2', 'v2');
        session(['k3'=> 'v3']);
        Session::put('k4', 'v4');
        Session::put(['k5'=> 'v5', 'k6'=> 'v6']);
        //推送数据到值为数组的 Session
        //Session::push(['k7'=> 'v7', 'k8'=> 'v8']);//错误写法
        Session::push('k7', 'v7');
        Session::push('k8', 'v8');
        $request->session()->flash('k9', 'v9');
    }
    public function getsession(Request $request){
        dd(session()->all());
        echo $request->session()->get('k1');
        echo session()->get('k2');
        echo session('k3');
        echo Session::get('k4');
        echo Session::get('k5');
        echo Session::get('k6');
        echo Session::get('k7.0');
        echo Session::get('k8.0');
        Session::pull('k7');    //删除指定session
        $request->session()->forget('k1');
        //$request->session()->flush();   //删除所有session

        if (Session::has('k1')){    //存在并且不为 null 的话返回 true
            dd(Session::all());
        }
        if (Session::exists('k1')){ //存在，即使是 null 的话也无所谓
            dd(Session::all());
        }
        echo $request->session()->get('k9');    //一次性，再次刷新不存在
    }
}
