<?php

/**
 * Class Boniche
 * @author Charlotte DELAIN, Théo DEPRESLE
 */

namespace utilitaires;

use PDO;

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
        filter_var($login, FILTER_SANITIZE_STRING);
        return $login;
    }
    public static function NettoyageMDP($mdp){
        filter_var($mdp, FILTER_SANITIZE_STRING);
        return $mdp;
    }
}
