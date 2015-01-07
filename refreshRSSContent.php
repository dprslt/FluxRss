<?php
/**
 * Created by PhpStorm.
 * Date: 19/12/2014
 * Time: 12:57
 */

use modele\FluxModele;
use metier\Flux;
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
}

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
    echo date(DATE_RFC850).'<br/>';
    echo "Mise à jour base de données fluxs RSS<br/>";
    echo "Flux Chargés : ".count($fluxs).'<br/>';
    echo "News Trouvées : ".$NewsModel->getNbNews().'<br/>';
    echo '<br/>';
    foreach($fluxs as $flux) {
        echo $flux->getPath().' : '.$mod->getNbNews($flux->getId()).'<br/>';
    }
?>
</body>
</html>