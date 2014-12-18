<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 10/12/2014
 * Time: 21:32
 */

namespace controleur;

use modele\FluxModele;
use utilitaires\Validation;

class adminControl{
    public function __construct(){

    }

    function addFlux()
    {
        Validation::existe($_REQUEST['link']);
        Validation::existe($_REQUEST['name']);
        Validation::URLValid($_REQUEST['link']);

        $link = $_REQUEST['valid'];
        $name = $_REQUEST['name'];

        $fluxMod = new FluxModele();
        $fluxMod->ajouterFlux($name, $link);
    }
}