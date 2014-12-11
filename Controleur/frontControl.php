<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 10/12/2014
 * Time: 21:30
 */

class frontControler{

    public function __construct()
    {
        require_once(__DIR__ . "/../Config/config.php");
        global $path;
        require_once ($path."Config/spLClassLoader.php");

        $myAutoLoader = new SplClassLoader("Config",$path);
        $myAutoLoader->register();
        $myAutoLoader = new SplClassLoader("Controleur", $path);
        $myAutoLoader->register();
        $myAutoLoader = new SplClassLoader("Metier",$path);
        $myAutoLoader->register();
        $myAutoLoader = new SplClassLoader("Modele",$path);
        $myAutoLoader->register();
        $myAutoLoader = new SplClassLoader("Utilitaires",$path);
        $myAutoLoader->register();


        //TODO Autoloader

        //TODO Dispatcher entre les controleurs => switch sur la var action
        require($path . "Controleur/userControl.php");

    }


}



