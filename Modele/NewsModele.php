<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 11/12/2014
 * Time: 11:36
 */

namespace modele;

use \utilitaires\PersistanceBD;

class NewsModele {

    private $dal;

    public function __construct(){
        $this->dal = new PersistanceBD();
    }

    public function getPageNews($page)
    {
        return $this->dal->getNews($page);
    }

    public function getNbNews(){
        return $this->dal->getNbNews();
    }

    public function getNewsFlux($fluxid,$page){
        return $this->dal->getNewsFlux($fluxid,$page);
    }

    public function viderBase(){
        $this->dal->viderNews();
    }
}