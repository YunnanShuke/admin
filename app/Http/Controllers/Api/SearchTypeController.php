<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SearchTypeController extends Controller
{
    //
    public function index(){
        $territory_banner = DB::table('malltypes')          //获取分类顶部图片
            -> where('deleted_at','=',null)
            -> where('id','=',1)
            -> pluck('type_pic');

        $territory_type = DB::table('malls')   //随机获取两条境内游
            -> where('deleted_at','=',null)
            -> where('mall_type','=',1)
            -> limit(2)
            -> get();

        $abroad_banner = DB::table('malltypes')          //获取分类顶部图片
        -> where('deleted_at','=',null)
            -> where('id','=',2)
            -> pluck('type_pic');

        $abroad_type = DB::table('malls')   //随机获取两条境外游
        -> where('deleted_at','=',null)
            -> where('mall_type','=',2)
            -> limit(2)
            -> get();

        $ticket_banner = DB::table('malltypes')          //获取分类顶部图片
        -> where('deleted_at','=',null)
            -> where('id','=',7)
            -> pluck('type_pic');

        $ticket_type = DB::table('malls')   //随机获取两条门票信息
        -> where('deleted_at','=',null)
            -> where('mall_type','=',7)
            -> limit(2)
            -> get();

        return \Response::json([
            'status' => config('tips.success'),
            'status_code' => config('tips.success_code'),
            'url_prefix' => config('tips.url_prefix'),
            'territory_pic' => $territory_banner,
            'abroad_pic' => $abroad_banner,
            'ticket_pic' => $ticket_banner,
            'territory' => $territory_type,
            'abroad' => $abroad_type,
            'ticket' => $ticket_type
        ]);
    }

    public function search_rand(){
        $rands = DB::select("SELECT * FROM malls ORDER BY RAND() LIMIT 3");
        return \Response::json([
            'status' => config('tips.success'),
            'status_code' => config('tips.success_code'),
            'data' => $rands
        ]);
    }
}
