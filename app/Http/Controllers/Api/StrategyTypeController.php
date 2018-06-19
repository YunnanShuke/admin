<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StrategyTypeController extends Controller
{
    //
    public function get_strategy_type(){
        $type = DB::select("select id,text from strategytypes");
        return $type;
    }

    public function index(){
        //获取门票
        $tickets = DB::table('malls')
            -> where('deleted_at','=',null)
            -> where('mall_type','=',7)
            -> get();
        $banners = DB::table('banners')
            -> where('deleted_at','=',null)
            -> where('banner_pos','=',4)
            -> get();  //轮播
        $strategies = DB::table('strategytypes')
            -> where('deleted_at','=',null)
            -> get();  //分类
        $malls = DB::select("SELECT * FROM malls ORDER BY RAND() LIMIT 3");   //随机推荐3个旅游商品
        $counts = DB::table('strategytypes') -> where('deleted_at','=',null) -> count();
        if($counts > 0){
            return \Response::json([
                'url_prefix' => config('tips.url_prefix'),
                'status' => config('tips.success'),
                'status_code' => config('tips.success_code'),
                'banner' => $banners,
                'data' => $strategies,
                'malls' => $malls,
                'tickets' => $tickets

            ]);
        }else{
            return \Response::json([
                'status' => config('tips.failed'),
                'status_code' => config('tips.failed_code'),
                'data' => $strategies
            ]);
        }
    }

    public function show($id){
        $type = DB::table('strategytypes') -> where('deleted_at','=',null) -> where('id','=',$id)-> get();
        $count = DB::table('strategytypes') -> where('deleted_at','=',null) -> where('id','=',$id)-> count();
        $strategyies = DB::table('strategys') -> where('deleted_at','=',null) -> where('strategy_type','=',$id) -> get();
        if($count >0){
            return \Response::json([
                'url_prefix' => config('tips.url_prefix'),
                'status' => config('tips.success'),
                'status_code' => config('tips.success_code'),
                'type' => $type,
                'data' => $strategyies
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
