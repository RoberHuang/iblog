<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorys', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('id');
            $table->string('cate_name', 200)->unique();
            $table->string('cate_title')->nullable();
            $table->string('cate_keywords')->nullable();
            $table->string('cate_description')->nullable();
            $table->unsignedInteger('cate_frequency')->default(0);
            $table->unsignedTinyInteger('cate_order')->default(0);
            $table->unsignedInteger('cate_pid')->default(0);
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
        Schema::dropIfExists('categorys');
    }
}
