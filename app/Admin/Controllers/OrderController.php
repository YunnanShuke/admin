<?php

namespace App\Admin\Controllers;

use App\Models\Order;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class OrderController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('订单管理');
            $content->description('服务器状态：正常');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('正在编辑订单信息');
            $content->description('服务器状态：正常');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('正在新增订单信息');
            $content->description('服务器状态：正常');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Order::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->openid('微信openid');
            $grid->mall_id('商品id');
            $grid->mall_name('商品名称');
            $grid->mall_pic('商品缩略图');
            $grid->order_sn('订单号');
            $grid->transaction_id('支付流水号');
            $grid->out_trade_no('贸易号');
            $grid->order_toal('订单金额');
            $grid->order_status('订单状态');
            $grid->result_code('返回码');
            $grid->remark('备注');

            $grid->created_at('创建时间');
            $grid->updated_at('更新时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Order::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('openid','微信openid');
            $form->email('mall_id','商品id');
            $form->text('mall_name','商品名称');
            $form->image('mall_pic','商品缩略图'); 
            $form->text('order_sn','订单号');
            $form->text('transaction_id','支付流水号');
            $form->text('out_trade_no','贸易号');
            $form->currency('order_toal','订单金额');
            $form->text('order_status','订单状态');
            $form->text('result_code','返回码');
            $form->textarea('remark','备注');

            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}
