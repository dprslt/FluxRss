<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 29/11/2014
 * Time: 17:06
 */

namespace controleur;

use Exception;
use metier\Flux;
use utilitaires\Validation;
use modele\FluxModele;
use modele\NewsModele;
use utilitaires\XMLParser;


class userControl
{
    public function __construct(){
        $tabErreur = array();


        try{
            switch ($_REQUEST['action']){
                case null:
                case 'afficherNews':
                    $this->afficherNews();
                    break;

                case "ajouterFlux":
                    $this->addFlux();
                    break;
            }
        }
        catch (Exception $e){
            $tabErreur[] = $e->getMessage();
            var_dump($tabErreur);
        }
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

    function afficherNews()
    {
        global $path, $vue;
        // 50 news par page
        $page = $_REQUEST['page'];
        if(!isset($page))
            $page = 1;
        Validation::isNumPage($page);

        $mod = new NewsModele();
        $newstab = $mod->getPageNews($page);
        $nbNews = $mod->getNbNews();

        require($vue['affichageNews']);
    }

    function afficherNewsDuFlux(){

    }

}

