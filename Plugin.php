<?php
namespace TypechoPlugin\jkOptionsFramework;
use Helper;
use Typecho\Plugin\PluginInterface;
use Typecho\Widget\Helper\Form;
use Typecho\{Plugin\Exception, Widget, Db};
use \CSF as CSF;
/**
 * jkOptionsFramework 是 Typecho 第一款选项框架
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
