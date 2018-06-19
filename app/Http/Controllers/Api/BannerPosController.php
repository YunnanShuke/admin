<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BannerPosController extends Controller
{
    //
    public function index(){
        $bannerpos = DB::select("select id,text from bannerpos");
        return $bannerpos;
    }
}
