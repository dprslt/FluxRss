<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 10/12/2014
 * Time: 21:42
 */

namespace modele;

use config\Validation;
use utilitaires\Boniche;
use utilitaires\PersistanceBD;

class FluxModele {

    private $dal;

    public function __construct(){
        $this->dal = new PersistanceBD();
    }

    public function getPageFlux($page){
        return $this->dal->getPageFluxs($page);
    }

    public function getFluxById($id){
        return $this->dal->getFluxById($id);
    }

    public function getListFlux(){
        return $this->dal->getListFlux();
    }

    public function saveFlux($flux){
        $this->dal->enregistrerFlux($flux);
    }

    public function ajouterFlux($link){
        $link = Boniche::NettoyageURL($link);
        $link = Boniche::NettoyageBDD($link);

        $this->dal->ajouterNouveauFlux($link);
    }

    public function supprimerFlux($id){
        $id = Boniche::NettoyageBDD($id);
        $this->dal->supprimerFlux($id);
    }


} 