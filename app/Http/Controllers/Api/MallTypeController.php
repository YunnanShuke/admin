<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MallTypeController extends Controller
{
    //产品分类接口
    public function index(){
        $types = \DB::select("select id,text from malltypes");
        return $types;
    }
}
