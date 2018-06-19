<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OpenidController extends Controller
{
    //获取用户openid
    public function index($code){
        $appid = "wxee91952e7df3c8fe";//wx8272c8a954593b50
        $secret = "fbbbb966e7ce265e24a7e09111b262de"; //09e0677b097cafa58fd312a01912c38f
        $URL = "https://api.weixin.qq.com/sns/jscode2session?appid=$appid&secret=$secret&js_code=$code&grant_type=authorization_code";
        $apiData=file_get_contents($URL);
        //$apiData = json_encode($URL);
        $json = json_decode($apiData);//对json数据解码
        $data = get_object_vars($json);
        $openid = $data['openid'];
        $token = str_random(60);
        $insert_token = DB::table('users') -> where('openid','=',$openid)-> update([
            'api_token' => $token,
            //'openid' => $openid
            /*'created_at' => date('Y-m-d H:i:s',time()),
            'updated_at' => date('Y-m-d H:i:s',time())*/
        ]);
        //$token = DB::insert("update users set api_token = UUID() where openid = '$openid'");
        if($insert_token == 1){
            $_token = DB::table('users') -> where('openid','=',$openid) -> where('deleted_at','=',null) -> pluck('api_token');
        }else{
            $_token = null;
        }
        //$check = DB::table('users') -> where('openid','=',$openid) -> where('deleted_at','=',null) -> get();
        $check = DB::select("select * from users where openid = '$openid'");

        //return $check;
        if($check){
            return \Response::json([
                'status' => 'success',
                'status_code' => 200,
                'check' => true,
                '$_token' => $_token,
                'data' => $data
            ]);
        }else{
            return \Response::json([
                'status' => 'success',
                'status_code' => 200,
                'check' => false,
                'data' => $data
            ]);
        }

    }
}