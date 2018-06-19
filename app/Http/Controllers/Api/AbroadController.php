<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AbroadController extends Controller
{
    //获取所有境外游信息
    public function index(){
        $text = '境外游';
        $id = $this->get_type($text);
        $articles = DB::table('malls') -> where('deleted_at','=',null) -> where('mall_type','=',$id) -> get();
        $count = DB::table('malls') -> where('deleted_at','=',null) -> where('mall_type','=',$id) -> count();
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
                'msg' => config('tips.db_error'),
                'type' => $id
            ]);
        }
    }


    //查询单个境外游信息
    public function show($id){
        $text = '境外游';
        $id = $this->get_type($text);
        $article = DB::table('malls') -> where('deleted_at','=',null) -> where('id','=',$id) -> get();
        $count = DB::table('malls') -> where('deleted_at','=',null) -> where('id','=',$id) -> count();
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
        $id = DB::table('malltypes') -> where('text','like',$text) -> pluck('id') -> first();
        return $id;
    }
}
