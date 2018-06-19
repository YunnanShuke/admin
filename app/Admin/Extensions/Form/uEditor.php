<?php
/**
 * Created by PhpStorm.
 * User: zhumingzhen
 * Email: z@it1.me
 * Date: 2018/5/10
 * Time: 22:44
 */
namespace App\Admin\Extensions\Form;
use Encore\Admin\Form\Field;

/**
 * 百度编辑器
 * Class uEditor
 * @package App\Admin\Extensions\Form
 */
class uEditor extends Field
{
    // 定义视图
    protected $view = 'admin.uEditor';

    // css资源
    protected static $css = [];

    // js资源
    protected static $js = [
        'vendor/laravel-u-editor/resources/public/ueditor.config.js',
        'vendor/laravel-u-editor/resources/public/ueditor.all.min.js',
        'vendor/laravel-u-editor/resources/public/lang/zh-cn/zh-cn.js'
    ];

    public function render()
    {
        $this->script = <<<EOT
        //解决第二次进入加载不出来的问题
        UE.delEditor("ueditor");
        // 默认id是ueditor
        var ue = UE.getEditor('ueditor', {
            // 自定义工具栏
            toolbars: [
                ['bold', 'italic', 'underline', 'strikethrough', 'blockquote', 'insertunorderedlist', 'insertorderedlist', 'justifyleft', 'justifycenter', 'justifyright', 'link', 'insertimage', 'source', 'fullscreen']
            ],
            elementPathEnabled: false,
            enableContextMenu: false,
            autoClearEmptyNode: true,
            wordCount: false,
            imagePopup: false,
            autotypeset: {indent: true, imageBlockLine: 'center'}
        }); 
        ue.ready(function () {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
        });

EOT;
        return parent::render();
    }
}