<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid')->comment('微信openid')->nullable();
            $table->string('mall_id')->comment('商品id')->nullable();
            $table->string('mall_name')->comment('商品名称')->nullable();
            $table->string('mall_pic')->comment('商品缩略图')->nullable();
            $table->string('order_sn')->comment('订单号')->nullable();
            $table->string('transaction_id')->comment('支付流水号')->nullable();
            $table->string('out_trade_no')->comment('贸易号')->nullable();
            $table->string('order_toal')->comment('订单金额')->nullable();
            $table->string('order_status')->comment('订单状态')->nullable();
            $table->string('result_code')->comment('支付返回码')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
