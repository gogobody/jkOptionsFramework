<?php
/**
 * 外部 jkOptions 接口
 */

use Typecho\Db;
require_once 'functions/options.php';

if (!class_exists('jkOptions')) {
    class jkOptions {

        private static ?jkOptions $instance = null;

        public function __construct()
        {

        }

        public static function getInstance(): jkOptions
        {
            if (is_null(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
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
