<?php

namespace App\Admin\Controllers;

use App\Models\Mall;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class MallController extends Controller
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

            $content->header('商品管理');
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

            $content->header('正在编辑商品');
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

            $content->header('正在新增商品');
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
        return Admin::grid(Mall::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->mall_title('商品标题');
            $grid->mall_pic('商品缩略图');
            $grid->mall_desc('商品摘要');
            $grid->mall_or_Price('商品原始价格');
            $grid->mall_price('商品售价');
            $grid->mall_suk('商品库存');
            $grid->mall_content('商品详情');
            $grid->tourism_phone('旅行社电话');
            $grid->tourism_name('旅行社名字');
            $grid->mall_type('商品分类');
            $grid->uuid('uuid');

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
        return Admin::form(Mall::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('mall_title','商品标题');
            $form->image('mall_pic','商品缩略图') -> uniqueName();
            $form->textarea('mall_desc','商品摘要');
            $form->currency('mall_or_Price','商品原始价格') -> symbol('￥');
            $form->currency('mall_price','商品售价') -> symbol('￥');
            $form->number('mall_suk','商品库存');
            $form->editor('mall_content','商品详情');
            $form->mobile('tourism_phone','旅行社电话');
            $form->text('tourism_name','旅行社名字');
            $form->select('mall_type','商品分类') -> options('/api/v1/malltypes');
            $form->display('uuid','uuid');

            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}
