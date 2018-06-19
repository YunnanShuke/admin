<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CustomsController extends Controller
{
    //获取所有攻略信息
    public function index(){
        $text = '民族风俗';
        $id = $this->get_type($text);
        $articles = DB::table('articles') -> where('deleted_at','=',null) -> where('article_type','=',$id) -> get();
        $count = DB::table('articles') -> where('deleted_at','=',null) -> where('article_type','=',$id) -> count();
        if($count > 0){
            return \Response::json([
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
        $article = DB::table('articles') -> where('deleted_at','=',null) -> where('id','=',$id) -> get();
        $count = DB::table('articles') -> where('deleted_at','=',null) -> where('id','=',$id) -> count();
        if($count > 0){
            return \Response::json([
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
