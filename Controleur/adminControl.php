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
        global $path;
        switch($_REQUEST['action']){
            case 'rafraichirNews':
                require($path.'refreshRSSContent.php');
                break;
        }
    }

    function addFlux()
    {
        Validation::existe($_REQUEST['link']);
        Validation::URLValid($_REQUEST['link']);

        $link = $_REQUEST['valid'];

        $fluxMod = new FluxModele();
        $fluxMod->ajouterFlux($link);
    }
}