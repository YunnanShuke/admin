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
            $table->increments('id');
            $table->string('article_title')->comment('文章标题')->nullable();
            $table->string('article_pic')->comment('文章缩略图')->nullable();
            $table->longText('article_content')->comment('文章内容')->nullable();
            $table->string('article_foot_pic')->comment('文章底部图片')->nullable();
            $table->string('article_type')->comment('文章分类')->nullable();
            $table->integer('article_click')->comment('文章点击量')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
