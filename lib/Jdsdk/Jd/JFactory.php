<?php
namespace Jd;

class JFactory {


    public static function createJClient()
    {
        return JClient::getInstance();
    }


    public static function createJConfig()
    {
        return JConfig::getInstance();
    }

}