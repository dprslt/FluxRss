<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 09/01/2015
 * Time: 11:43
 */

namespace modele;


use PDO;
use utilitaires\BD;
use utilitaires\PersistanceBD;

class ParametreModele {
    private $dal;

    public function __construct(){
        $this->dal = new PersistanceBD();
    }

    public function getParameters($parameter){
        return $this->dal->getParameters($parameter);
    }

    public function setParameters($param, $value){
       $this->dal->setParameters($param,$value);
    }

    public function removeParameters($param){
        $this->dal->removeParameters($param);
    }
}