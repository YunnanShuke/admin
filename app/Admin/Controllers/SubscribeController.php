<?php

namespace App\Admin\Controllers;

use App\Models\Subscribe;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class SubscribeController extends Controller
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

            $content->header('预约信息管理');
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

            $content->header('正在审核预约信息');
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

            $content->header('正在新增预约信息');
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
        return Admin::grid(Subscribe::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name('预约人');
            $grid->phone('预约人电话');
            $grid->remark('备注');
            $grid->status('状态');
            $grid->operator('后台操作者');
            $grid->operator_remark('后台操作者备注');

            $grid->created_at('提交时间');
            $grid->updated_at('处理时间');

            $grid->disableCreateButton();//禁用新增按钮
            //$grid->disableActions();  //禁用行操作
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Subscribe::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name','预约人');
            $form->text('phone','预约人电话');
            $form->text('remark','备注');
            $form->select('status','状态') -> options(['已处理' => '已处理', '待处理' => '待处理', '异常' => '异常']);
            $form->text('operator','后台操作者');
            $form->text('operator_remark','后台操作者备注');

            $form->display('created_at', '提交时间');
            $form->display('updated_at', '处理时间');
        });
    }
}
