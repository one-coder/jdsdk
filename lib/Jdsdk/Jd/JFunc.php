<?php
namespace Jd;

class JFunc {

    /**
     * All data type change to string
     *
     * @param $params
     */
    public static function allDataType2String(&$params)
    {
        if (!is_array($params) || !count($params))
        {
            $params = "";
            return ;
        }

        foreach ($params as $key => $val) {
            $params[$key] = is_null($val) ? "" : strval($val);
        }

        return ;
    }



    /**
     * Get full URL
     *
     * @return string
     */
    public static function getFullUrl()
    {
        $url = (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') ? 'https://' : 'http://';
        $url .= $_SERVER['HTTP_HOST'];
        $url .= isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : urlencode($_SERVER['PHP_SELF']) . '?' . urlencode($_SERVER['QUERY_STRING']);
        return $url;
    }



}