<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 10/12/2014
 * Time: 21:30
 */
namespace controleur;
use config\SplClassLoader;
use controleur\adminControl;
use controleur\userControl;
use metier\Flux;
use utilitaires\XMLParser;
use modele\AdminModele;
use Exception;
use Twig_Autoloader;
use Twig_Environment;
use Twig_Loader_Filesystem;

require_once(__DIR__ ."/../Config/config.php");

class frontControl{


    public function __construct()
    {

        global $path;

        require_once ($path."Config/spLClassLoader.php");


        $myAutoLoader = new SplClassLoader("config",$path);
        $myAutoLoader->register();
        $myAutoLoader = new SplClassLoader("controleur", $path);
        $myAutoLoader->register();
        $myAutoLoader = new SplClassLoader("metier",$path);
        $myAutoLoader->register();
        $myAutoLoader = new SplClassLoader("modele",$path);
        $myAutoLoader->register();
        $myAutoLoader = new SplClassLoader("utilitaires",$path);
        $myAutoLoader->register();
        $myAutoLoader = new SplClassLoader("Twig",$path."lib/");
        $myAutoLoader->setNamespaceSeparator("_");
        $myAutoLoader->register();
        
        $loader = new Twig_Loader_Filesystem('Vue/Templates'); // Dossier contenant les templates
        $twig = new Twig_Environment($loader, array(
            'cache' => false
        ));

        $template = $twig->loadTemplate('pageErreur.twig');

        try{
            $action=$_REQUEST['action'];
            $TabAdmin=array('ajouterFlux', 'supprimerFlux', 'modifierFlux', 'rafraichirNews');
            $adminModele = new AdminModele();
            $a=$adminModele->isAdmin();
            if(in_array($action, $TabAdmin)){
                new adminControl();
                //Attente page authentification + Session
                return;
                if($a==null){
                    $_POST['action']="connexion";
                    new userControl();
                }
                else{
                    new adminControl();
                }
            }
            else{
                new userControl();
            }
        } catch (Exception $ex) {
            $TabErreur = array($ex->getMessage());
            
                echo $template->render(array(
                        'Erreur' => $TabErreur
                    ));           
        }
        


      

        //TODO Dispatcher entre les controleurs => switch sur la var action


    }


}



