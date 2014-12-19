<?php

/**
 * Class Boniche
 * @author Charlotte DELAIN, Théo DEPRESLE
 */

class Boniche {
    public static function NettoyageBDD($var){
        filter_var($var,FILTER_SANITIZE_MAGIC_QUOTES);
        return $var;
    }

    public static function NettoyageURL($url){
        filter_var($url,FILTER_SANITIZE_URL);
        return $url;
    }
    
    public static function NettoyageLOGIN($login){
        filter_var($login, mysql_real_escape_string($login));
        return $login;
    }
    public static function NettoyageMDP($mdp){
        filter_var($mdp,mysql_real_escape_string($mdp));
        return $mdp;
    }
}
