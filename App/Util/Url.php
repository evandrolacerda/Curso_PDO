<?php

namespace App\Util;

/**
 * Description of Url
 *
 * @author Evandro Lacerda <evandroplacerda@@gmail.com>
 */
class Url
{

    public static function url($target, $queryStrings = null)
    {
        $url = 'http://' . $_SERVER['SERVER_NAME'];

        if (isset($_SERVER['SERVER_PORT'])) {
            $url .= ':' . $_SERVER['SERVER_PORT'];
        }


        $url .= $target;

        if ($params) {
            $url .= http_build_query($params);
        }
        return $url;
    }
    
    public static function getUrl()
    {
        $url = 'http://' . $_SERVER['SERVER_NAME'];

        if (isset($_SERVER['SERVER_PORT'])) {
            $url .= ':' . $_SERVER['SERVER_PORT'];
        }
        
        $url.=  $_SERVER['REQUEST_URI'];// . $_SERVER['QUERY_STRING'];
        
        
        return $url;
    }
}
