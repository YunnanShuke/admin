<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //获取所有用用户信息
    public function index(){
        $users = new User();
        $get_users = $users -> get();
        $get_user_count = $users -> count();
        if($get_user_count > 0){
            return \Response::json([
                'status' => config('tips.success'),
                'status_code' => config('tips.success_code'),
                'data' => $get_users
            ]);
        }else{
            return \Response::json([
                'status' => config('tips.failed'),
                'status_code' => config('tips.failed_code'),
                'message' => config('tips.db_error'),
                'data' => $get_users
            ]);
        }

    }

    public function show($id){
        $users = new User();
        $get_user_count = $users -> where('id','=',$id) -> count();
        $get_user = $users -> find($id);
        if($get_user_count > 0){
            return \Response::json([
                'status' => config('tips.success'),
                'status_code' => config('tips.success_code'),
                'data' => $get_user
            ]);
        }else{
            return \Response::json([
                'status' => config('tips.failed'),
                'status_code' => config('tips.failed_code'),
                'message' => config('tips.db_error'),
                'data' => $get_user
            ]);
        }
    }

    public function store(Request $request){
        $check_openid = DB::table('users') -> where('deleted_at','=',null) -> where('openid','=',$_SERVER['HTTP_OPENID']) -> count();
        if([$check_openid] > 0){
            $insert = DB::table('users') -> insert([
                'openid' => $_SERVER['HTTP_OPENID'],
                'nickName' => $request -> input('nickName'),
                'avatarUrl' => $request -> input('avatarUrl'),
                'gender' => $request -> input('gender'),
                'city'=>$request -> input('city'),
                'province' => $request -> input('province'),
                'country' => $request -> input('country'),
                'language' => $request -> input('language'),
                'address' => $request -> input('address'),
                'phone' => $request -> input('phone'),
                'api_token' => str_random(60),
                'created_at' => date('Y-m-d H:i:s',time()),
                'deleted_at' => date('Y-m-d H:i:s',time())
            ]);
            if($insert ==1 ){
                $api_token = DB::table('users') -> where('openid','=',$_SERVER['HTTP_OPENID']) -> pluck('api_token');
                return \Response::json([

                    'status' => config('tips.success'),
                    'status_code' => config('tips.success_code'),
                    'msg' => config('tips.insert_success'),
                    'api_token' => $api_token
                ]);
            }else{
                $api_token = DB::table('users') -> where('openid','=',$_SERVER['HTTP_OPENID']) -> pluck('api_token');
                return \Response::json([
                    'status' => config('tips.failed'),
                    'status_code' => config('tips.failed_code'),
                    'api_token' => $api_token,
                    'msg' => config('tips.insert_error')
                ]);
            }
        }else{
            $api_token = DB::table('users') -> where('openid','=',$_SERVER['HTTP_OPENID']) -> pluck('api_token');
            return \Response::json([
                'status' => config('tips.failed'),
                'status_code' => config('tips.failed_code'),
                'api_token' => $api_token,
                'msg' => '已存在该用户！'
            ]);
        }

    }
}
