<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mall_pic')->comment('商品缩略图')->nullable();
            $table->string('mall_title')->comment('商品标题')->nullable();
            $table->longText('mall_desc')->comment('商品描述')->nullable();
            $table->string('mall_num')->comment('购买数量')->nullable();
            $table->string('mall_price')->comment('商品单价')->nullable();
            $table->text('remark')->comment('备注')->nullable();
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
        Schema::dropIfExists('carts');
    }
}
