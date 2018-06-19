<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StrategyController extends Controller
{
    //获取所有攻略信息
    public function index($id){
        $articles = DB::table('strategys') -> where('deleted_at','=',null) -> where('strategy_type','=',$id) -> get();
        $count = DB::table('strategys') -> where('deleted_at','=',null) -> where('strategy_type','=',$id) -> count();
        if($count > 0){
            return \Response::json([
                'url_prefix' => config('tips.url_prefix'),
                'status' => config('tips.success'),
                'status_code' => config('tips.success_code'),
                'data' => $articles
            ]);
        }else{
            return \Response::json([
                'status' => config('tips.failed'),
                'status_code' => config('tips.failed_code'),
                'msg' => config('tips.db_error')
            ]);
        }
    }


    //查询单个攻略信息
    public function show($id){
        $article = DB::table('strategys') -> where('deleted_at','=',null) -> where('id','=',$id) -> get();
        $count = DB::table('strategys') -> where('deleted_at','=',null) -> where('id','=',$id) -> count();
        if($count > 0){
            return \Response::json([
                'url_prefix' => config('tips.url_prefix'),
                'status' => config('tips.success'),
                'status_code' => config('tips.success_code'),
                'data' => $article
            ]);
        }else{
            return \Response::json([
                'status' => config('tips.failed'),
                'status_code' => config('tips.failed_code'),
                'msg' => config('tips.db_error')
            ]);
        }
    }

    //获取分类信息
    public function get_type($text){
        $id = DB::table('articletypes') -> where('text','like',$text) -> pluck('id') -> first();
        return $id;
    }
}
