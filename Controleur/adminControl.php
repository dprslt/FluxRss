<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 10/12/2014
 * Time: 21:32
 */

namespace controleur;

use modele\AdminModele;
use modele\FluxModele;
use utilitaires\Validation;
use Twig_Autoloader;
use Twig_Environment;
use Twig_Loader_Filesystem;

class adminControl{
    private $twig;
    private $fluxModele;
    private $adminModele;
    
    public function __construct(){
        global $path;
        
        $this->fluxModele = new FluxModele();
        $this->adminModele = new AdminModele();
        
        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem('Vue/Templates');
        $this->twig = new Twig_Environment($loader, array(
            'cache' => false
        ));
        
        $action = (isset($_REQUEST['action'])?$_REQUEST['action']:null);
        switch($action){
            case 'pageConnexion':
                $this->AfficherPageConnexion();
                break;
            case 'connexion':
                $this->connexion();
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
    
    function AfficherPageConnexion(){
        $fluxs = $this->fluxModele->getPageFlux(1);
        $template = $this->twig->loadTemplate('pageConnexion.twig');
        echo $template->render(array(
            'Fluxs' => $fluxs,
                ));
    }
    
    function connexion(){
    $connexion = $this->adminModele->connecter($_POST['login'],$_POST['mdp']);
    }
}