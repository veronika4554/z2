<?php

    define('DB_HOST', 'localhost');
    define('DB_NAME', 'db_news');
    define('DB_USER', 'root'); // ваш логин
    define('DB_PASS', ''); // ваш пароль
    define('DB_CHAR', 'utf8');

    class DB
    {
        protected static $instance = null;

        public function __construct() {}
        public function __clone() {}

        public static function instance()
        {
            if (self::$instance === null)
            {
                $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHAR;
                self::$instance = new PDO($dsn, DB_USER, DB_PASS);
            }
            return self::$instance;
        }

        public static function __callStatic($method, $args)
        {
            return call_user_func_array(array(self::instance(), $method), $args);
        }

        public static function run($sql, $args = array())
        {
            if (!$args)
                return self::instance()->query($sql);
            $stmt = self::instance()->prepare($sql);
            $stmt->execute($args);
            return $stmt;
        }
    }