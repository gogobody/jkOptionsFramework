<?php

if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}
/**
 *
 * Plugin Name: jkOptions Framework
 * Plugin URI: http://www.ijkxs.com/
 * Author: Codestar
 * Author URI: http://www.ijkxs.com/
 * Version: 1.0.0
 * Description: 一个轻量级的 Typecho 主题&后台 选项框架
 * Text Domain: csf
 * Domain Path: /languages
 *
 */
use Typecho\I18n;
use TypechoPlugin\jkOptionsFramework\jkRouter;

if (!function_exists('untrailingslashit')){
    function untrailingslashit( $string ) {
        return rtrim( $string, '/\\' );
    }
}

if (!function_exists('trailingslashit')) {
    function trailingslashit($string)
    {
        return untrailingslashit($string) . '/';
    }
}
if (!function_exists('plugin_dir_path')) {

    function plugin_dir_path($file)
    {
        return trailingslashit(dirname($file));
    }
}
if (class_exists('\Typecho\I18n')){
    I18n::setLang(plugin_dir_path(__FILE__) . 'languages/zh_CN.mo');
}

// 仅在插件页或者主题页添加 class
// Add admin body class
if (strpos($_SERVER['REQUEST_URI'], 'plugin.php')!==false or strpos($_SERVER['REQUEST_URI'], 'theme.php')){
    // set body class
    global $bodyClass;
    $bodyClass = $bodyClass.'wp-core-ui csf-fa5-shims';
}

require_once plugin_dir_path(__FILE__) . 'functions/defines.php';
require_once plugin_dir_path(__FILE__) . 'functions/plugin.php';
require_once plugin_dir_path(__FILE__) . 'functions/media-template.php';

require_once plugin_dir_path(__FILE__) . 'functions/wp_query.php';
require_once plugin_dir_path(__FILE__) . 'functions/class.wp_term_query.php';
require_once plugin_dir_path(__FILE__) . 'functions/class.wp_user_query.php';
require_once plugin_dir_path(__FILE__) . 'functions/class.wp_meta_query.php';


// init cache
require_once plugin_dir_path(__FILE__) . 'functions/class.wp_object_cache.php';

if ( function_exists( 'wp_cache_init' ) ) {
    wp_cache_init();
}

// init router
require_once 'jkRouter.php';

// init role
require_once plugin_dir_path(__FILE__) . 'functions/class.wp_roles.php';
$GLOBALS['wp_roles'] = new WP_Roles();


// init CSF
require_once plugin_dir_path(__FILE__) . 'classes/setup.class.php';
/**
 *
 * Extended Setup Class for Shortland
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if (!class_exists('CSF')) {
    class CSF extends CSF_Setup
    {
    }
}
