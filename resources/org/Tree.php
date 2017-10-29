<?php
/**
 * Created by PhpStorm.
 * User: Rober
 * Date: 2017/10/29
 * Time: 13:10
 */

namespace resources\org;

class Tree
{
    static public $treeList = array();  //无限级分类结果列表
    static public $str = '';

    public function createTree( $data, $field_id='id', $field_pid='pid', $field_name='name', $pid=0 )
    {
        if ($pid!=0)
        {
            $str .= "&nbsp;&nbsp;";
        }

        foreach ($data as $key=>$row)
        {
            if ($row->$field_pid==$pid)
            {
                if ($pid!=0)
                {
                    $row->_.$field_name = $str.'|--'.$row->$field_name;
                }
                self::$treeList[] = $row;
                unset($data[$key]);
                self::createTree($data, $row->$field_id);
            }
        }
        return self::$treeList;
    }

}