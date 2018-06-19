<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class testController extends Controller
{
    //

    public function index(){
        $users = DB::table('users') -> get();
        return \Response::json([$users]);
    }

    public function store(Request $request){
        $user = new User();
        $user -> name = $request -> input('name');
        $user -> email = $request -> input('email');
        $user -> password = $request -> input('password');
        $ehcek = $user -> save();
        var_dump($ehcek);
    }
}
