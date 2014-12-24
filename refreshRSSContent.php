<?php
/**
 * Created by PhpStorm.
 * Date: 19/12/2014
 * Time: 12:57
 */

use modele\FluxModele;
use modele\NewsModele;

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
