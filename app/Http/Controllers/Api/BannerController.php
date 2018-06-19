<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    //获取所有轮播图信息
    public function index(){
        $banners = DB::table('banners') -> where('deleted_at','=',null) -> get();
        $count = DB::table('banners') -> where('deleted_at','=',null) -> count();
        if($count > 0){
            return \Response::json([
                'url_prefix' =>  config('tips.url_prefix'),
                'status' => config('tips.success'),
                'status_code' => config('tips.success_code'),
                'data' => $banners
            ]);
        }else{
            return \Response::json([
                'status' => config('tips.failed'),
                'status_code' => config('tips.failed_code'),
                'msg' => config('tips.db_error')
            ]);
        }
    }

    public function index_banner(){
        $banners = DB::table('banners') -> where('deleted_at','=',null) -> where('banner_pos','=',1) -> get();
        $count = DB::table('banners') -> where('deleted_at','=',null) -> where('banner_pos','=',1) -> count();
        if($count > 0){
            return \Response::json([
                'url_prefix' => config('tips.url_prefix'),
                'status' => config('tips.success'),
                'status_code' => config('tips.success_code'),
                'data' => $banners
            ]);
        }else{
            return \Response::json([
                'status' => config('tips.failed'),
                'status_code' => config('tips.failed_code'),
                'msg' => config('tips.db_error')
            ]);
        }
    }

    public function about_banner(){
        $banners = DB::table('banners') -> where('deleted_at','=',null) -> where('banner_pos','=',3) -> get();
        $count = DB::table('banners') -> where('deleted_at','=',null) -> where('banner_pos','=',3) -> count();
        if($count > 0){
            return \Response::json([
                'url_prefix' => config('tips.url_prefix'),
                'status' => config('tips.success'),
                'status_code' => config('tips.success_code'),
                'data' => $banners
            ]);
        }else{
            return \Response::json([
                'status' => config('tips.failed'),
                'status_code' => config('tips.failed_code'),
                'msg' => config('tips.db_error')
            ]);
        }

    }
}
