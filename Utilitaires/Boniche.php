<?php


class Boniche {
    public static function NettoyageBDD($var){
        filter_var($var,FILTER_SANITIZE_MAGIC_QUOTES);
        return $var;
    }

    public static function NettoyageURL($url){
        filter_var($url,FILTER_SANITIZE_URL);
        return $url;
    }
}
