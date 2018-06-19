<?php

namespace App\Admin\Controllers;

use App\Models\Picture;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class PictureController extends Controller
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

            $content->header('员工展示管理');
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

            $content->header('正在编辑展示信息');
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

            $content->header('正在新增展示信息');
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
        return Admin::grid(Picture::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name('员工姓名');
            $grid->pic('员工图片');
            $grid->gender('员工性别');
            $grid->age('员工年龄');
            $grid->position('员工职位');
            $grid->content('描述');
            $grid->remark('员工备注');

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
        return Admin::form(Picture::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name','员工姓名');
            $form->image('pic','员工图片') -> uniqueName();
            $form->select('gender','员工性别') -> options(['男'=> '男','女' => '女']);
            $form->number('age','员工年龄');
            $form->text('position','员工职位');
            $form->editor('content','描述');
            $form->textarea('remark','员工备注');
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}
