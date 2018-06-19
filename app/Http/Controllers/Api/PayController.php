<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

require_once 'WeixinPay.php';

class PayController extends Controller
{
    //
    public function index(Request $request){
        $appid='wxee91952e7df3c8fe';
        $openid= $_SERVER['HTTP_OPENID'];
        $mch_id='1507361661';
        $key='U4ewBg7cLdbd2jrdqIX5HnTYFqof4174';
        $out_trade_no = $mch_id. time();    //贸易号
        $total_fee = $request -> input('total');   //交易金额
        $mall_type_code = $request -> input('mall_type_code');    //商品类别代码
        $mall_id = $request -> input('mall_id');         //商品id
        if($mall_type_code < 2000){
            $malls = DB::table('courses') -> where('id','=',$mall_id) -> where('deleted_at','=',null) -> first();
            $mall_title = $malls -> course_title;   //商品名
            $mall_pic = $malls -> course_pic;   //商品
            $insert = DB::table('orders') -> insert([
                'openid' => $openid,
                'mall_id' => $mall_id,
                'mall_name' => $mall_title,
                'mall_pic' => $mall_pic,
                'order_toal' => $total_fee,
                'out_trade_no' => $out_trade_no,
                'created_at' => date('Y-m-d H:i:s',time())
            ]);
        }else{
            $malls = DB::table('malls') -> where('id','=',$mall_id) -> where('deleted_at','=',null) -> first();
            $mall_title = $malls -> mall_name;   //商品名
            $mall_pic = $malls -> mall_pic;   //商品
            $insert = DB::table('orders') -> insert([
                'openid' => $openid,
                'mall_id' => $mall_id,
                'mall_name' => $mall_title,
                'mall_pic' => $mall_pic,
                'order_toal' => $total_fee,
                'out_trade_no' => $out_trade_no,
                'created_at' => date('Y-m-d H:i:s',time())
            ]);
        }

        if(empty($total_fee))
        {
            $body = $mall_title;
            $total_fee = floatval(1*100);
        }
        else {
            $body = $mall_title;
            $total_fee = floatval($total_fee*100);
        }
        $weixinpay = new WeixinPay($appid,$openid,$mch_id,$key,$out_trade_no,$body,$total_fee);
        $return=$weixinpay->pay();

        //echo json_encode($return);
        if($insert ==1 ){
            return \Response::json([
                'status' => 'success',
                'status_code' => 200,
                'data' => $return,
                'message' => '小松，支付成功！写入订单成功了！'
            ]);
        }{
            return \Response::json([
                'status' => 'failed',
                'status_code' => 100,
                'data' => $return,
                'message' => '小松，支付成功！但是写入订单失败了！'
            ]);
        }

    }
}