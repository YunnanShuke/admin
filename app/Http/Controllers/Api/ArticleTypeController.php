<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ArticleTypeController extends Controller
{
    //
    public function index()
    {
        $type = DB::select("select id,text from articletypes");
        return $type;
    }
}
