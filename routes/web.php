<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

//Route::middleware('api')->get('/users', 'Api\testController@index');
//Route::get('users','Api\testController@index');
/*
Route::get('users','Api\testController@index');*/
/*
Route::post('api/v1/users','Api\testController@store');*/
Route::resource('/api/v1/bannerpos','Api\BannerPosController');   // 轮播图位置管理
Route::get('api/v1/openid/{code?}','Api\OpenidController@index');     //获取用户openid
Route::any('api/v1/notify','Api\payNotify@index');   //微信支付回调接口
Route::get('api/v1/articletypes','Api\ArticleTypeController@index');   //文章分类接口
Route::post('/uploadFile', 'Api\UploadsController@uploadImg');//文件上传路由
Route::get('api/v1/malltypes','Api\MallTypeController@index');  //商品分类
Route::get('api/v1/strategytype','Api\StrategyTypeController@get_strategy_type');  //攻略分类