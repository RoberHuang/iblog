<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
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
            $path = $file->move(base_path().'/uploads',$newName); //app_path().'storage/uploads'==>app的storage/uploads的目录下
            $file_path = 'uploads/'.$newName;

            return $file_path;
        }*/
    }
}
