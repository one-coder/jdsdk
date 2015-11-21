<?php

/**
 * Created by PhpStorm.
 *
 * Author: one_coder@sina.com
 * Time: 2015-11-21
 */

/**
 * Dir path define
 */
define('JD_BASE_PATH', dirname(__FILE__));
define('JD_DATA_PATH', JD_BASE_PATH . '/Jd/Data/');
define('JD_LOG_PATH', JD_BASE_PATH . '/Jd/Log/');
define('JD_CONFIG_FILE_PATH', JD_DATA_PATH . 'config.json');
define('JD_ERROR_FILE_PATH', JD_DATA_PATH . 'error.json');

/**
 * Exception code define
 */
define('JD_EXCEPTION_ERROR', '');
define('JD_EXCEPTION_WARING', '');
define('JD_EXCEPTION_INFO', '');



class Jd {


    protected static $initialize = false;


    public function __construct() {}


    /**
     * Autoloader for Jd
     *
     * @param string $class Class name to load
     */
    public static function autoloader($class)
    {
        // Check that the class namespace starts with "Jd"
        if (strpos($class, 'Jd') !== 0) return;
        $file = str_replace('\\', DIRECTORY_SEPARATOR, $class);

        if (file_exists(JD_BASE_PATH . DIRECTORY_SEPARATOR . $file . '.php'))
        {
            require_once(JD_BASE_PATH . DIRECTORY_SEPARATOR . $file . '.php') ;
        }
    }


    /**
     * Register the built-in autoloader
     */
    public static function registerAutoloader()
    {
        spl_autoload_register(array('Jd', 'autoloader'));
    }

    /**
     * Initialize register tree
     */
    public static function initialize()
    {
        // Register config obj
        \Jd\JRegister::set('config', \Jd\JFactory::createJConfig());

        // Register client obj
        \Jd\JRegister::set('client', \Jd\JFactory::createJClient());

        self::$initialize = true;
    }


    public static function get($name)
    {
        self::$initialize OR self::initialize();
        return \Jd\JRegister::get(strval($name));
    }

    /**
     * @param \Jd\Api\IApi $api
     * @return \Jd\JResult
     */
    public static function execute(\Jd\Api\IApi $api)
    {
        self::$initialize OR self::initialize();

        $client = \Jd\JRegister::get('client');
        return $client->execute($api);
    }


    /**
     * @param array $params
     */
    public static function oauth2($params = array())
    {
        self::$initialize OR self::initialize();

        \Jd\Oauth2::oauth2($params);
    }

    /**
     * @param bool|false $return
     * @throws JException
     */
    public static function redirect($return = false) {

        self::$initialize OR self::initialize();

        try {
            \Jd\Oauth2::redirect($return);
        } catch(JException $e)
        {
            $e->printExpInfo();
        }

    }

    /**
     * @param \Jd\Api\IApi $api
     */
    public static function apiVerify(\Jd\Api\IApi $api)
    {
        \Jd\Api\JApiVerify::verify($api);
        \Jd\Api\JApiVerify::printVerifyInfo();
    }

    /**
     * Verify authorizes is overdue or not
     *
     * @return bool
     */
    public static function isOverdue()
    {
        return \Jd\Oauth2::isOverdue();
    }

}