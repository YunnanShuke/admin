<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RouteController extends Controller
{
    //获取所有路线信息学
    public function index(){
        $routes = DB::table('articles') -> where('deleted_at','=',null) -> where('article_type','=',3) -> get();
        $count = DB::table('articles') -> where('deleted_at','=',null) -> where('article_type','=',3) -> count();
        if($count > 0){
            return \Response::json([
                'url_prefix' =>  config('tips.url_prefix'),
                'status' => config('tips.success'),
                'status_code' => config('tips.success_code'),
                'data' => $routes
            ]);
        }else{
            return \Response::json([
                'status' => config('tips.failed'),
                'status_code' => config('tips.failed_code'),
                'msg' => config('tips.db_error')
            ]);
        }

    }


    //获取单挑路由路线
    public function show($id){
        $route = DB::table('articles') -> where('deleted_at','=',null) -> where('article_type','=',3) -> where('id','=',$id) -> get();
        $count = DB::table('articles') -> where('deleted_at','=',null) -> where('article_type','=',3) -> where('id','=',$id) -> count();
        if($count > 0){
            return \Response::json([
                'url_prefix' =>  config('tips.url_prefix'),
                'status' => config('tips.success'),
                'status_code' => config('tips.success_code'),
                'data' => $route
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
