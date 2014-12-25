<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 25/12/2014
 * Time: 15:57
 */

namespace utilitaires;


class Utils {
    /**
     * Get favicon from a URL.
     *
     * @param string $sUrl
     * @return string The favicon image.
     */
    public static function get_favicon($sUrl)
    {
        $sApiUrl = 'http://www.google.com/s2/favicons?domain=';
        $sDomainName = self::get_domain($sUrl);

        return $sApiUrl . $sDomainName;
    }

    /**
     * Get domain name from a URL (helper function).
     *
     * @param string $sUrl
     * @return string $sUrl Returns the URL to lower case and without the www. if present in the URL.
     */
    public static function get_domain($sUrl)
    {
        $sUrl = str_ireplace('www.', '', $sUrl);
        $sHost = parse_url($sUrl, PHP_URL_HOST);
        return $sHost;
    }
}