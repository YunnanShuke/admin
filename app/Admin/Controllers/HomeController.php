<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Tab;
use Encore\Admin\Widgets\InfoBox;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content) {


            $content->header('控制面板');
            $content->description('服务器状态：正常');

            $content->row(function ($row) {
                $users = DB::table('users') -> count();//用户数量
                $row->column(3, new InfoBox('用户总量', 'users', 'aqua', '/admin/users',$users));

                //新增订单数量
                $orders_count  = DB::table('orders') -> count();
                if($orders_count < 1){
                    $orders_count = 0;
                }
                $row->column(3, new InfoBox('新增订单', 'shopping-cart', 'green', '/admin/orders', $orders_count));

                //新增文章数量
                $article_count = DB::table('articles') -> count();
                if($article_count < 1){
                    $articles = 0;
                }else{
                    $articles  = DB::table('articles') -> count();
                }
                $row->column(3, new InfoBox('新增文章', 'book', 'yellow', '/admin/article', $articles));

                //待处理信息条数
                $msg_count = DB::table('articles') -> count();
                $subscribe_count = DB::table('subscribes') -> count();
                $msg_count = $msg_count + $subscribe_count;
                if($msg_count < 1){
                    $msg_count = 0;
                }
                $row->column(3, new InfoBox('待处理信息', 'info', 'red', '/admin/subscribes', $msg_count));

                $row->column(12,view('admin.bar'));

            });


        });
    }
}
