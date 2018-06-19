<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticletypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articletypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text')->comment('分类名称')->nullable();
            $table->string('type_code')->comment('分类代码')->nullable();
            $table->string('type_pic')->comment('分类图标')->nullable();
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
        Schema::dropIfExists('articletypes');
    }
}
