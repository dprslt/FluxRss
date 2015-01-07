<?php
/**
 * Created by PhpStorm.
 * Date: 19/12/2014
 * Time: 12:57
 */

use modele\FluxModele;
use modele\NewsModele;
use config\SplClassLoader;

require_once("Config/config.php");
require_once ($path."Config/spLClassLoader.php");

/* Chargement de l'autoloader */
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

$mod = new FluxModele();
$fluxs = $mod->getListFlux();

$NewsModel = new NewsModele();
$NewsModel->viderBase();


foreach($fluxs as $flux){
    $rss = new \utilitaires\XMLParser($flux);
    $rss->parse();
    $mod->saveFlux($rss->getFlux());
    var_dump($rss->getFlux());
}
