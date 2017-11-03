<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    //把published_at字段转成Carbon格式
    protected $dates = ['published_at'];

    protected $fillable = [
        'cate_id', 'article_title', 'article_keywords', 'article_description', 'article_thumb', 'article_content', 'article_author', 'cate_frequency', 'publish_at'
    ];

    //把published_at从Y-m-d转成Y-m-d H:i:s
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    public function category()
    {
        return $this->belongsTo('App\Http\Model\Admin\Category', 'cate_id');
    }
}
