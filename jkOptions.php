<?php
/**
 * 外部 jkOptions 接口
 */

use Typecho\Db;
require_once 'functions/options.php';

if (!class_exists('jkOptions')) {
    class jkOptions {

        public function __construct()
        {

        }

        public static function getInstance(): jkOptions
        {
            return new self();
        }

        public static function get_option($option, $default = false)
        {
            return get_option($option, $default);
        }

        public static function update_option($option, $value, $autoload = null): void
        {
            update_option($option, $value, $autoload);
        }
    }
}
