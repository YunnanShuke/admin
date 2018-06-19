<?php

namespace App\Admin\Controllers;

use App\Models\Strategy;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class StrategyController extends Controller
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

            $content->header('攻略信息管理');
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

            $content->header('正在编辑攻略信息');
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

            $content->header('正在新增攻略信息');
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
        return Admin::grid(Strategy::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->strategy_title('攻略标题');
            $grid->strategy_pic('攻略缩略图');
            $grid->strategy_content('攻略内容');
            $grid->strategy_type('攻略分类');
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
        return Admin::form(Strategy::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('strategy_title','攻略标题');
            $form->image('strategy_pic','攻略缩略图') -> uniqueName();
            $form->editor('strategy_content','攻略内容');
            $form->select('strategy_type','攻略分类') -> options('/api/v1/strategytype');
            $form->textarea('remark','备注');

            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}
