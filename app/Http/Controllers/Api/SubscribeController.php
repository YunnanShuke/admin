<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SubscribeController extends Controller
{
    //获取当前用户的所有预约信息
    public function index(){
        $subscribes = DB::table('subscribes') -> where('openid','=',$_SERVER['HTTP_OPENID']) -> where('deleted_at','=',null) -> get();
        $count = DB::table('subscribes') -> where('openid','=',$_SERVER['HTTP_OPENID']) -> where('deleted_at','=',null) -> count();
        if($count > 0){
            return \Response::json([
                'status' => config('tips.success'),
                'status_code' => config('tips.success_code'),
                'data' => $subscribes
            ]);
        }else{
            return \Response::json([
                'status' => config('tips.failed'),
                'status_code' => config('tips.failed_code'),
                'msg' => config('tips.db_error')
            ]);
        }
    }

    //获取单个预约信息详情
    public function show($id){
        $subscribe = DB::table('subscribes') -> where('deleted_at','=',null) -> where('id','=',$id) -> get();
        $count = DB::table('subscribes') -> where('deleted_at','=',null) -> where('id','=',$id) -> count();
        if($count > 0){
            return \Response::json([
                'status' => config('tips.success'),
                'status_code' => config('tips.success_code'),
                'data' => $subscribe
            ]);
        }else{
            return \Response::json([
                'status' => config('tips.failed'),
                'status_code' => config('tips.failed_code'),
                'msg' => config('tips.db_error')
            ]);
        }
    }

    //创建一条预约信息
    public function store(Request $request){
        $insert = DB::table('subscribes') -> insert([
            'openid' => $_SERVER['HTTP_OPENID'],
            'name' => $request -> input('name'),
            'phone' => $request -> input('phone'),
            'remark' => $request -> input('remark'),
            'status' => config('tips.subscribes_default_status')
        ]);
        if ($insert == 1){
            return \Response::json([
                'status' => config('tips.success'),
                'status_code' => config('tips.success_code'),
                'msg' => config('tips.insert_success')
            ]);
        }else{
            return \Response::json([
                'status' => config('tips.failed'),
                'status_code' => config('tips.failed_code'),
                'msg' => config('tips.insert_error')
            ]);
        }
    }
}
