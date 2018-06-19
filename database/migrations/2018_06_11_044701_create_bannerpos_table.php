<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bannerpos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text')->comment('轮播图位置');
            $table->string('pos_pic')->comment('图标')->nullable();
            $table->string('pos_content')->comment('位置信息介绍')->nullable();
            $table->string('remark')->comment('备注')->nullable();
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
        Schema::dropIfExists('bannerpos');
    }
}
