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
use Twig_Autoloader;
use Twig_Environment;
use Twig_Loader_Filesystem;
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

    function afficherNews()
    {
        global $path, $vue;
        // 50 news par page
        $page = $_REQUEST['page'];
        if(!isset($page))
            $page = 1;
        Validation::isNumPage($page);

        $mod = new NewsModele();
        $fluxsMod = new FluxModele();
        $newstab = $mod->getPageNews($page);
        $nbNews = $mod->getNbNews();
        $tabFlux = $fluxsMod->getPageFlux(1);



        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem('Vue/Templates'); // Dossier contenant les templates
        $twig = new Twig_Environment($loader, array(
            'cache' => false
        ));
        $template = $twig->loadTemplate('pageAccueil.twig');
        echo $template->render(array(
            'News' => $newstab,
            'Flux' => $tabFlux
        ));


        //require($vue['affichageNews']);
    }

    function afficherNewsDuFlux(){

    }

}

