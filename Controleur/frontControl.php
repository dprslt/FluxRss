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
        require_once($path . "Utilitaires/Validation.php");
        require_once($path . "Utilitaires/Boniche.php");

        //TODO Autoloader

        //TODO Dispatcher entre les controleurs => switch sur la var action
        require($path . "Controleur/userControl.php");

    }


}



