<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    //
    public function index(){
        $banners = DB::table('banners') -> where('deleted_at','=',null) -> where('banner_pos','=',5) -> get();
        $pic = DB::table('pictures') -> where('deleted_at','=',null) -> get();   //获取员工展示图片
        $about_text = DB::table('abouts') -> where('deleted_at','=',null) -> get();
        $count = DB::table('abouts') -> where('deleted_at','=',null) -> count();
        if($count > 0){
            return \Response::json([
                'url_prefix' => config('tips.url_prefix'),
                'status' => config('tips.success'),
                'status_code' =>config('tips.success_code'),
                'data' => $about_text,
                'pic_data' => $pic,
                'banner_data' => $banners
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
