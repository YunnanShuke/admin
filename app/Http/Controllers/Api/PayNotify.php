<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class payNotify extends Controller
{
    public function index(){
        define('IN_ECS', true);

        //微信返回的数据
        $input = file_get_contents("php://input");

        if($input){
            $xml = simplexml_load_string($input);
            $total_fee = (string)$xml->total_fee;   //付款金额
            $order_status = (string)$xml->return_code;   //订单状态
            $openid = (string)$xml->openid;        //openid
            $mch_id = (string)$xml->mch_id;         //商户号
            $out_trade_no = (string)$xml->out_trade_no;     //贸易号
            $order_sn = (string)$xml->out_trade_no;
            $transaction_id = (string)$xml -> transaction_id;  //微信支付流水号

            DB::table('test') -> insert(['content' => $total_fee]);
            DB::table('test') -> insert(['content' => $order_status]);
            DB::table('test') -> insert(['content' => $openid]);
            DB::table('test') -> insert(['content' => $mch_id]);
            DB::table('test') -> insert(['content' => $out_trade_no]);
            DB::table('test') -> insert(['content' => $order_sn]);
            DB::table('test') -> insert(['content' => $transaction_id]);
            DB::table('test') -> insert(['content' => 'test']);

            $insert = DB::table('orders') -> where('openid','=',$openid) -> where('out_trade_no','=',$out_trade_no) -> update([
                'order_sn' => $order_sn,
                'transaction_id' => $transaction_id,
                'order_status' => $order_status,
                'result_code' => $order_status,
                'updated_at' => date('Y-m-d H:i:s',time())
            ]);
            if($insert ==1 ){
                $this->return_success();
                $this->return_success_agin();    //发送成功信息给腾讯
            }else{
                DB::table('orders') -> update([
                    'order_status' => 'error!'
                ]);
            }

        }else{
            $this->return_success();
            $this->return_success_agin();
        }


    }

    private function return_success(){
        $return['return_code'] = 'SUCCESS';
        $return['return_msg'] = 'OK';
        $xml_post = '<xml>
                    <return_code>'.$return['return_code'].'</return_code>
                    <return_msg>'.$return['return_msg'].'</return_msg>
                    </xml>';
        echo $xml_post;
    }
    private function return_success_agin(){
        $return['return_code'] = 'SUCCESS';
        $return['return_msg'] = 'OK';
        $xml_post = '<xml>
                    <return_code>'.'SUCCESS'.'</return_code>
                    <return_msg>'.'OK'.'</return_msg>
                    </xml>';
        echo $xml_post;
        exit;
    }
}