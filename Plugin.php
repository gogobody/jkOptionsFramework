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
 * <div class="jkOptionsStyle"><a style="width:fit-content" id="jkOptions">您目前使用的是最新版</div>&nbsp;</div><style>.jkOptionsStyle{margin-top: 5px;}.jkOptionsStyle a{font-size: smaller;background: #4DABFF;padding: 5px;color: #fff;}</style>
 * <script>var jkoptversion="1.0.4";function jkoptionsframework_update(){localStorage.setItem("jkoptionsframework_update",(new Date()).getHours());var container=document.getElementById("jkOptions");if(!container){return}var ajax=new XMLHttpRequest();container.style.display="block";ajax.open("get","https://api.github.com/repos/gogobody/jkOptionsFramework/releases/latest");ajax.send();ajax.onreadystatechange=function(){if(ajax.readyState===4&&ajax.status===200){var obj=JSON.parse(ajax.responseText);var newest=obj.name;if(newest>jkoptversion){container.innerHTML="发现新版本："+obj.name+'。下载地址：<a href="'+obj.zipball_url+'">点击下载</a>'+"<br>您目前的版本:"+String(jkoptversion)+"。"}else{container.innerHTML="您目前使用的是最新版。"}}}};if(Math.abs(localStorage.getItem("jkoptionsframework_update") - (new Date()).getHours())>1){jkoptionsframework_update();}</script>
 * @package jkOptionsFramework
 * @author gogobody
 * @version 1.0.4
 * @link https://www.ijkxs.com
 *
 */



if (!defined('__TYPECHO_ROOT_DIR__')) exit;
require_once 'jkoptions-framework.php';
require_once 'samples/admin-options.php';

class Plugin implements PluginInterface
{


    public static function activate()
    {
        jkRouter::initRouter();
        \Typecho\Plugin::factory('index.php')->begin = [__CLASS__, 'initevent'];
        \Typecho\Plugin::factory('admin/header.php')->header_999 = [__CLASS__, 'enqueue_style'];
        \Typecho\Plugin::factory('admin/footer.php')->end_999 = [__CLASS__, 'enqueue_script'];
        \CSF::activateEvent();
    }

    public static function deactivate()
    {
        jkRouter::removeRouter();
    }

    public static function initevent()
    {
        if (!class_exists('jkOptions')){
            require_once \Utils\Helper::options()->pluginDir('jkOptionsFramework').'/jkOptions.php';
        }
    }
    public static function enqueue_style($header=null, $old=null)
    {
        if ($old!=null) $header = $old;
        return CSF::get_enqueue_style($header);
    }

    public static function enqueue_script($footer=null)
    {
        return CSF::get_enqueue_script($footer);
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
