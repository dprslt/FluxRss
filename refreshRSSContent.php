<?php
/**
 * Created by PhpStorm.
 * Date: 19/12/2014
 * Time: 12:57
 */

use modele\FluxModele;

$mod = new FluxModele();
$fluxs = $mod->getListeFlux();

//Vidage de la bdd?

foreach($fluxs as $flux){
    $rss = new \utilitaires\XMLParser($flux);
    $rss->parse();
    $mod->saveFlux($rss->getFlux());
    var_dump($rss->getFlux());
}
