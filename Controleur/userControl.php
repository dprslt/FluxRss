<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 29/11/2014
 * Time: 17:06
 */

$tabErreur = array();

function addFlux(){
    Validation::existe($_REQUEST['link']);
    Validation::existe($_REQUEST['name']);
    Validation::URLValid($_REQUEST['link']);

    $link = $_REQUEST['valid'];
    $name = $_REQUEST['name'];

    $fluxMod = new FluxModele();
    $fluxMod->ajouterFlux($name, $link);
}

function afficherNews(){
    // 50 news par page
    $page = $_REQUEST['page'];
    Validation::existe($page);
    Validation::isNumPage($page);

    $mod = new NewsModele();
    $news = $mod->getPageNews();
}


echo $path;

if(isset($_REQUEST['action']))
    $action = $_REQUEST['action'];
else
    $action = null;

try{
    switch ($action){

        case null:
            echo "11";
            echo '<a href=".?action=tet" >ICI</a>';
            break;
        case "addFlux":
            addFlux();
            break;
    }
}
catch(Exception $e){
    $tabErreur[] = $e->getMessage();
}



