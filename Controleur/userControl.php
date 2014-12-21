<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 29/11/2014
 * Time: 17:06
 */

namespace controleur;


use Twig_Autoloader;
use Twig_Environment;
use Twig_Loader_Filesystem;
use utilitaires\Validation;
use modele\FluxModele;
use modele\NewsModele;
use utilitaires\XMLParser;


class userControl
{
    private $newsModele;
    private $fluxModele;

    public function __construct(){
        $this->newsModele = new NewsModele();
        $this->fluxModele = new FluxModele();
        switch ($_REQUEST['action']){
            case null:
            case 'afficherNews':
                $this->afficherNews();
                break;

        }
    }

    function afficherNews()
    {
        global $path, $vue;
        $page = $_REQUEST['page'];
        if(!isset($page))
            $page = 1;
        Validation::isNumPage($page);

        $newstab = $this->newsModele->getPageNews($page);
        $nbNews = $this->newsModele->getNbNews();
        $tabFlux = $this->fluxModele->getPageFlux(1);


        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem('Vue/Templates');
        $twig = new Twig_Environment($loader, array(
            'cache' => false
        ));
        $template = $twig->loadTemplate('pageAccueil.twig');

        echo $template->render(array(
            'News' => $newstab,
            'Flux' => $tabFlux,
            'numpage' => $page
        ));

    }

    function afficherNewsDuFlux(){

    }

}

