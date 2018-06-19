<?php

namespace App\Admin\Controllers;

use App\Models\User;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class UserController extends Controller
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

            $content->header('用户信息管理');
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

            $content->header('正在编辑用户信息');
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

            $content->header('正在新增用户信息');
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
        return Admin::grid(User::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->openid('微信openid');
            $grid->nickName('用户昵称') -> editable();
            $grid->avatarUrl('用户头像');
            $grid->gender('用户性别');
            $grid->city('城市');
            $grid->province('省份');
            $grid->country('国家');
            $grid->language('语言');
            $grid->address('地址');
            $grid->phone('手机号');
            $grid->api_token('token');

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
        return Admin::form(User::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('openid','微信openid');
            $form->text('nickName','用户昵称');
            $form->image('avatarUrl','用户头像');
            $form->radio('gender','用户性别') -> options([1 => '男', 2 => '女', 0 => '未知']);
            $form->text('city','城市');
            $form->text('province','省份');
            $form->text('country','国家');
            $form->text('language','语言');
            $form->text('address','地址');
            $form->mobile('phone','手机号');
            $form->text('api_token','token');

            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}
