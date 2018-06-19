<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Route::resource('users','Api\testController@index');//用户操作路由

Route::resource('users','Api\UserController');  //用户管理路由
Route::any('pay','Api\PayController@index');    //微信支付接口
Route::resource('strategys','Api\StrategyController');   //获取攻略信息接口
Route::resource('territories','Api\TerritoryController');   //获取境内游信息接口
Route::resource('abroads','Api\AbroadController'); //获取境外游信息
Route::resource('customs','Api\CustomsController');   //民族风俗
Route::resource('subscribes','Api\SubscribeController');   //预约信息管理
Route::resource('activities','Api\ActivityController');   //获取活动信息
Route::get('bannerIndex','Api\BannerController@index_banner');    //首页轮播图
Route::get('bannerAbout','Api\BannerController@about_banner');   //关于我们轮播图
Route::get('abouts','Api\AboutController@index');   //关于我们文字信息
Route::resource('routes','Api\RouteController');   //路由路线管理
Route::resource('strategytypes','Api\StrategyTypeController'); //分类信息
Route::get('search','Api\SearchTypeController@index');//分类查询
Route::get('search/rand','Api\SearchTypeController@search_rand');   //随机获取三个产品