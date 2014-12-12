<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 29/11/2014
 * Time: 17:06
 */

namespace controleur;

use Exception;
use utilitaires\Validation;
use modele\FluxModele;
use modele\NewsModele;


class userControl
{
    public function __construct(){
        $tabErreur = array();

        try{
            switch ($_REQUEST['action']){

                case 'afficherNews':
                case null:
                    $this->afficherNews();
                    break;

                case "ajouterFlux":
                    $this->addFlux();
                    break;
            }
        }
        catch (Exception $e){
            $tabErreur[] = $e->getMessage();
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
        // 50 news par page
        $page = $_REQUEST['page'];
        Validation::existe($page);
        Validation::isNumPage($page);

        $mod = new NewsModele();
        $news = $mod->getPageNews($page);

        var_dump($news);

    }

}

