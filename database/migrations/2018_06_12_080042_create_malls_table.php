<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('malls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mall_pic')->comment('商品缩略图')->nullable();
            $table->string('mall_title')->comment('商品标题')->nullable();
            $table->string('mall_desc')->comment('商品摘要')->nullable();
            $table->string('mall_or_Price')->comment('商品原始价格')->nullable();
            $table->string('mall_price')->comment('商品售价')->nullable();
            $table->integer('mall_suk')->comment('商品库存')->nullable();
            $table->longText('mall_content')->comment('商品详情')->nullable();
            $table->string('tourism_phone')->comment('旅行社电话')->nullable();
            $table->string('tourism_name')->comment('旅行社名字')->nullable();
            $table->string('mall_type')->comment('商品分类')->nullable();
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
        Schema::dropIfExists('malls');
    }
}
