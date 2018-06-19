<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request,Closure $next)
    {
        $input_token = $_SERVER['HTTP_TOKEN'];
        $token = DB::table('users') -> where('openid','=',$_SERVER['HTTP_OPENID']) -> pluck('api_token') -> first();
        $count = DB::table('users') -> where('openid','=',$_SERVER['HTTP_OPENID']) -> pluck('api_token') -> count();
        if($input_token == $token){
            return $next($request);
        }else{
            if($input_token == null){
                return config('tips.token_error').config('tips.token_error_null');
            }else if($count < 1){
                if($_SERVER['HTTP_OPENID'] == null){
                    return config('tips.token_error').config('tips.token_error_openid_null');
                }
                return config('tips.token_error').config('tips.token_error_db_error');
            }
        }
    }
}
