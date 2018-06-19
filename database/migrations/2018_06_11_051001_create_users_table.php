<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid')->comment('微信openid')->nullable();
            $table->string('nickName')->comment('用户昵称')->nullable();
            $table->string('avatarUrl')->comment('用户头像，最后一个数值代表正方形头像大小（有0、46、64、96、132数值可选，0代表640*640正方形头像），用户没有头像时该项为空。若用户更换头像，原有头像URL将失效。')->nullable();
            $table->string('gender')->comment('用户的性别，值为1时是男性，值为2时是女性，值为0时是未知')->nullable();
            $table->string('city')->comment('用户所在城市')->nullable();
            $table->string('province')->comment('用户所在省份')->nullable();
            $table->string('country')->comment('用户所在国家')->nullable();
            $table->string('language')->comment('用户的语言，简体中文为zh_CN')->nullable();
            $table->string('address')->comment('用户地址')->nullable();
            $table->string('phone')->comment('手机号')->nullable();
            $table->string('api_token')->comment('接口请求token')->nullable();
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
        Schema::dropIfExists('users');
    }
}
