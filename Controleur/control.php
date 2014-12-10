<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 29/11/2014
 * Time: 17:06
 */



require_once(__DIR__."/../Config/config.php");

require_once("Utilitaires/Validation.php");
$tabErreur = array();

function addFlux(){
    try{
        Validation::existe($_REQUEST['link']);
        Validation::existe($_REQUEST['name']);

        Boniche::NettoyageURL($_REQUEST['link']);
        Validation::URLValid($_REQUEST['link']);

        $link = $_REQUEST['valid'];
        $name = $_REQUEST['name'];

        Boniche::NettoyageBDD($link);
        Boniche::NettoyageBDD($name);

        //FluxModele->newFlux


    }
    catch(Execption $e){
        $tabErreur[] = $e->getMessage();
    }
}


echo $path;

if(isset($_REQUEST['action']))
    $action = $_REQUEST['action'];
else
    $action = null;

switch ($action){

    case null:
        echo "11";
        echo '<a href=".?action=tet" >ICI</a>';
        break;
    case "addFlux":
        addFlux();
        break;
}




