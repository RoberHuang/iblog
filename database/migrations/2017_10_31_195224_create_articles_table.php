<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('id');
            $table->string('article_title', 128);
            $table->unsignedInteger('cate_id')->default(0);;
            $table->string('article_keywords', 128)->nullable();
            $table->string('article_description')->nullable();
            $table->string('article_thumb')->nullable();
            $table->text('article_content');
            $table->string('article_author', 64)->nullable();
            $table->unsignedInteger('cate_frequency')->default(0);
            $table->timestamp('publish_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
