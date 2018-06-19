<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('banners',BannerController::class);    //轮播图管理
    $router->resource('bannerpos',BannerPosController::class);   //轮播图位置管理
    $router->resource('users',UserController::class);         //用户信息管理
    $router->resource('article',ArticleController::class);  //文章信息管理
    $router->resource('articletypes',ArticleTypeController::class);  //文章分类
    $router->resource('malltypes',MallTypeController::class);     //商品分类
    $router->resource('malls',MallController::class);   //商品管理
    $router->resource('subscribes',SubscribeController::class);   //预约信息
    $router->resource('abouts',AboutController::class);   //关于我们文字信息
    $router->resource('strategys',StrategyController::class);   //攻略信息
    $router->resource('strategyiestypes',StrategyTypeController::class);   //攻略分类
    $router->resource('pictures',PictureController::class);   //员工展示图片
});
