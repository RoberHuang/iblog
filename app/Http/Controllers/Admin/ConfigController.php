<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin\Config;
use Illuminate\Http\Request;

class ConfigController extends AdminController
{
    //
    public function index(){
        $data = Config::orderBy('conf_order', 'asc')->get();
        foreach ($data as $k=>$v){
            switch ($v->field_type){
                case 'input':
                    $data[$k]->_html = '<input type="text" class="lg" name="conf_content[]" value="'.$v->conf_content.'">';
                    break;
                case 'textarea':
                    $data[$k]->_html = '<textarea type="text" class="lg" name="conf_content[]">'.$v->conf_content.'</textarea>';
                    break;
                case 'radio':
                    //1|开启,0|关闭
                    $arr = explode(',',$v->field_value);
                    $str = '';
                    foreach($arr as $m=>$n){
                        //1|开启
                        $r = explode('|',$n);
                        $c = $v->conf_content==$r[0]?' checked ':'';
                        $str .= '<input type="radio" name="conf_content[]" value="'.$r[0].'"'.$c.'>'.$r[1].'　';
                    }
                    $data[$k]->_html = $str;
                    break;
            }

        }
        $path = ['module'=> 'config', 'action'=> 'index'];

        return view('admin.config.index', compact('data', 'path'));
    }

    public function create(){
        $path = ['module'=> 'config', 'action'=> 'add'];
        return view('admin.config.add', compact('path'));
    }

    public function store(Request $request){
        $this->validate($request, [
           'conf_title' => 'required',
            'conf_name' => 'required',
            'field_value' => array('regex:/^(\w)+\|(\w)+,)*$/i'),
            'conf_order' => 'integer|between:0,255',
        ],[
            'field_value.regex' => '类型值格式不正确',
        ]);


        $res = Config::create($request->all());
        if ($res){
            return [
                'status' => '0',
                'errors' => trans('admin/common.add_success')
            ];
        }else{
            return [
                'status' => '1',
                'errors' => trans('admin/common.add_fail')
            ];
        }
    }
}
