<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStrategysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strategys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('strategy_pic')->comment('攻略封面图')->nullable();
            $table->string('strategy_title')->comment('攻略标题')->nullable();
            $table->string('strategy_content')->comment('攻略内容')->nullable();
            $table->string('strategy_foot_pic')->comment('攻略底部图片')->nullable();
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
        Schema::dropIfExists('strategys');
    }
}
