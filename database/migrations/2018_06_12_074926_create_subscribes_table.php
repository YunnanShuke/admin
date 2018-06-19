<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('预约人');
            $table->string('phone')->comment('预约人电话');
            $table->string('remark')->comment('备注')->nullable();
            $table->string('status')->comment('状态')->nullable();
            $table->string('operator')->comment('后台操作者')->nullable();
            $table->string('operator_remark')->comment('后台操作者备注');
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
        Schema::dropIfExists('subscribes');
    }
}
