<?php
/**
 * 外部 jkOptions 接口
 */

use Typecho\Db;
require_once 'functions/options.php';

if (!class_exists('jkOptions')) {
    class jkOptions {

        private static $instance = null;

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

        // ** 用于 获取 数组值 并且避免 warning
        public static function getValue($array, $key, $default = null)
        {
            if (is_array($key)) {
                $lastKey = array_pop($key);
                foreach ($key as $keyPart) {
                    $array = self::getValue($array, $keyPart);
                }
                $key = $lastKey;
            }
            if (is_array($array) && array_key_exists($key, $array)) {
                return $array[$key];
            }
            if (($pos = strrpos($key, '.')) !== false) {
                $array = self::getValue($array, substr($key, 0, $pos), $default);
                $key = substr($key, $pos + 1);
            }
            if (is_object($array)) {
                //如果该属性不存在，或者预期没有实现，则预期失败。
                //事先检查属性是否可访问是不可靠的
                return $array->$key;
            } elseif (is_array($array)) {
                return array_key_exists($key, $array) ? $array[$key] : $default;
            } else {
                return $default;
            }
        }
    }
}
