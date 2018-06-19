<?php

namespace App\Admin\Controllers;

use App\Models\Malltype;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class MallTypeController extends Controller
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

            $content->header('商品分类管理');
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

            $content->header('正在编辑商品分类');
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

            $content->header('正在新增商品分类');
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
        return Admin::grid(Malltype::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->text('分类名称');
            $grid->type_code('分类代码');
            $grid->type_pic('分类缩略图');
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
        return Admin::form(Malltype::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('text','分类名称');
            $form->text('type_code','分类代码');
            $form->image('type_pic','分类缩略图') -> uniqueName();
            $form->textarea('remark','备注');

            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}
