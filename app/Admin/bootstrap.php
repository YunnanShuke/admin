<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

use App\Admin\Extensions\WangEditor;
use Encore\Admin\Form;
use App\Admin\Extensions\Form\CKEditor;
use App\Admin\Extensions\Form\uEditor;
use Encore\Admin\Facades\Admin;


Encore\Admin\Form::forget(['map', 'editor']);
Form::extend('editor', WangEditor::class);
Form::extend('ckeditor', CKEditor::class);
Form::extend('ueditor', uEditor::class);
Admin::js('/vendor/chartjs/Chart.min.js');  //自定义图标
//自定义头部
Admin::navbar(function (\Encore\Admin\Widgets\Navbar $navbar) {

    //$navbar->left('html...');

    $navbar->right(new \App\Admin\Extensions\nav\Links());

});