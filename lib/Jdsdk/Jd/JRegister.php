<?php
namespace Jd;

class JRegister {

    /**
     * @var array
     */
    protected static $objects = array();

    /**
     * Register obj
     *
     * @param $alias
     * @param $obj
     */
    public static function set($alias, $obj)
    {
        if ($alias && $obj) {
            self::$objects[$alias] = $obj;
        }
    }

    /**
     * Get obj
     *
     * @param $alias
     * @return null
     */
    public static function get($alias)
    {
        if (isset(self::$objects[$alias])) {
            return self::$objects[$alias];
        }

        return null;
    }

    /**
     * Unset obj
     *
     * @param $alias
     */
    public static function _unset($alias)
    {
        unset(self::$objects[$alias]);
    }

}