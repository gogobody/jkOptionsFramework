<?php
namespace TypechoPlugin\jkOptionsFramework;
use Utils\Helper;
use Typecho\Plugin\PluginInterface;
use Typecho\Widget\Helper\Form;
use Typecho\{Plugin\Exception, Widget, Db, Widget\Request as WidgetRequest};
use \CSF as CSF;
use Widget\Options;

/**
 * jkOptionsFramework 是 Typecho 第一款选项框架
 * <div class="simpleAdminStyle"><a style="width:fit-content" id="simpleAdmin">版本检测中..</div>&nbsp;</div><style>.simpleAdminStyle{margin-top: 5px;}.simpleAdminStyle a{background: #4DABFF;padding: 5px;color: #fff;}</style>
 * <script>var simversion="1.0.0";function update_detec(){var container=document.getElementById("simpleAdmin");if(!container){return}var ajax=new XMLHttpRequest();container.style.display="block";ajax.open("get","https://api.github.com/repos/gogobody/jkOptionsFramework/releases/latest");ajax.send();ajax.onreadystatechange=function(){if(ajax.readyState===4&&ajax.status===200){var obj=JSON.parse(ajax.responseText);var newest=obj.tag_name;if(newest>simversion){container.innerHTML="发现新版本："+obj.name+'。下载地址：<a href="'+obj.zipball_url+'">点击下载</a>'+"<br>您目前的版本:"+String(simversion)+"。"+'<a target="_blank" href="'+obj.html_url+'">👉查看新版亮点</a>'}else{container.innerHTML="您目前的版本:"+String(simversion)+"。"+"您目前使用的是最新版。"}}}};update_detec();</script>
 * @package jkOptionsFramework
 * @author gogobody
 * @version 1.0.0
 * @link https://ijkxs.com
 *
 */



if (!defined('__TYPECHO_ROOT_DIR__')) exit;
require_once 'jkoptions-framework.php';
require_once 'samples/admin-options.php';

class Plugin implements PluginInterface
{


    public static function activate()
    {

        \Typecho\Plugin::factory('admin/header.php')->header_999 = [__CLASS__, 'enqueue_style'];
        \Typecho\Plugin::factory('admin/footer.php')->end_999 = [__CLASS__, 'enqueue_script'];
        \CSF::activateEvent();
    }

    public static function deactivate()
    {
        Helper::removeRoute('saveJKoptions');
        Helper::removeRoute('saveJKoptions_ajax');

    }

    public static function enqueue_style($header=null)
    {
        return CSF::get_enqueue_style($header);
    }

    public static function enqueue_script($old=null)
    {
        return CSF::get_enqueue_script($old);
    }

    public static function config(Form $form)
    {

        CSF::setup(basename(__DIR__));

        return CSF::setTypechoOptionForm($form);

    }

    public static function personalConfig(Form $form)
    {
        // TODO: Implement personalConfig() method.
    }
}
