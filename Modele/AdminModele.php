<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 18/12/2014
 * Time: 10:46
 */

namespace modele;


use utilitaires\PersistanceBD;

class AdminModele {
    public function __construct(){

    }

    public function isAdmin(){
        $dal = new PersistanceBD();
        //RECUP + netoyage
        $dal->authentifier("r");
    }
} 