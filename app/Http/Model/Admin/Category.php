<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'category';
    //protected $primaryKey = "cate_id";
    //public $timestamps = false;   //取消默认的时间控制

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cate_name', 'cate_title', 'cate_keywords', 'cate_description', 'cate_frequency', 'cate_order', 'cate_pid',
    ];

    //protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    //protected $hidden = [];

    public function articles()
    {
        return $this->hasMany('App\Http\Model\Admin\Article', 'cate_id');
    }
}
