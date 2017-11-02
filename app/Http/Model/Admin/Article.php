<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = [
        'cate_id', 'article_title', 'article_keywords', 'article_description', 'article_thumb', 'article_content', 'article_author', 'cate_frequency', 'publish_at'
    ];

    public function category()
    {
        return $this->belongsTo('App\Http\Model\Admin\Category', 'cate_id');
    }
}
