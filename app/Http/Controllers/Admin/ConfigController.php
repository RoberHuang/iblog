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
                    $data[$k]->_html = '<input type="text" class="" name="conf_content[]" value="'.$v->conf_content.'">';
                    break;
                case 'textarea':
                    $data[$k]->_html = '<textarea type="text" class="" cols="30" rows="2" name="conf_content[]">'.$v->conf_content.'</textarea>';
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
            //'field_value' => array('regex:/^((\d+\|[\w\x80-\xff]+,)+\d+\|[\w\x80-\xff]+)*$/i'),
            'conf_order' => 'integer|between:0,255',
        ],[
            //'field_value.regex' => '类型值格式不正确',
        ]);

        if (!empty($request->input('field_value'))){
            if (preg_match('/^((\d+\|[\w\x80-\xff]+,)+\d+\|[\w\x80-\xff]+)*$/i', $request->input('field_value')) === 0){
                return [
                    'status' => '1',
                    'errors' => trans('admin/common.field_val_err')
                ];
            }
        }

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

    public function edit($id){
        $result = Config::findOrFail($id);
        $path = ['module'=> 'category', 'action'=> 'edit'];

        return view('admin.config.edit', compact('result', 'path'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'conf_title' => 'required',
            'conf_name' => 'required|unique:config,conf_name,'.$id,
            'conf_order' => 'integer|between:0,255',
        ]);

        if (!empty($request->input('field_value'))){
            if (preg_match('/^((\d+\|[\w\x80-\xff]+,)+\d+\|[\w\x80-\xff]+)*$/i', $request->input('field_value')) === 0){
                return [
                    'status' => '1',
                    'errors' => trans('admin/common.field_val_err')
                ];
            }
        }

        $conf = Config::find($id);
        if (is_null($conf)){
            return [
                'status' => '1',
                'errors' => trans('admin/common.data_abnormal')
            ];
        }

        $result = $conf->update($request->all());
        if ($result){
            return [
                'status' => '0',
                'errors' => trans('admin/common.edit_success')
            ];
        }else{
            return [
                'status' => '1',
                'errors' => trans('admin/common.edit_fail')
            ];
        }
    }

    public function destroy(Request $request, $id){
        $result = Config::find($id);
        if (is_null($result)){
            return [
                'status' => '1',
                'errors' => trans('admin/common.data_abnormal')
            ];
        }

        if ($result->delete()){
            return [
                'status' => '0',
                'errors' => trans('admin/common.operation_success')
            ];
        }else{
            return [
                'status' => '1',
                'errors' => trans('admin/common.operation_fail')
            ];
        }
    }

    public function setOrder(Request $request){
        $conf = Config::find($request->input('id'));

        if (is_null($conf)){
            return [
                'status' => '1',
                'errors' => trans('admin/common.data_abnormal')
            ];
        }else{
            $conf->conf_order = $request->input('order');
            $re = $conf->update();

            if ($re){
                return [
                    'status' => '0',
                    'errors' => trans('admin/common.operation_success')
                ];
            }else{
                return [
                    'status' => '1',
                    'errors' => trans('admin/common.operation_fail')
                ];
            }
        }
    }

    public function setConf(Request $request){
        foreach($request->input('conf_id') as $key=>$val){
            Config::where('id',$val)->update(['conf_content'=>$request->input('conf_content')[$key]]);
        }
        $this->putFile();
        return [
            'status' => '0',
            'errors' => trans('admin/common.operation_success')
        ];
    }

    public function putFile(){
        $config = Config::pluck('conf_content','conf_name')->all();
        $path = base_path().'/config/web.php';
        $str = '<?php return '.var_export($config,true).';';
        file_put_contents($path,$str);
    }
}
