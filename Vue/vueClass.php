<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 10/12/2014
 * Time: 19:24
 */
    include_once('../lib/Twig/Autoloader.php');
    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('Templates'); // Dossier contenant les templates
    $twig = new Twig_Environment($loader, array(
        'cache' => false
    ));


    $template = $twig->loadTemplate('News.twig');
    
    $Flux = new Flux(1, '');
    $News = new News(2, 'titre', 'url', 'urlImage');

?>
<!DOCTYPE HTML>
<html>
<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="CSS/desktop.css"/>
<header>

    <body>
        <div class="top_bar" >
            <?=
            $template->render(array(
                '$News' => 'Twig'
            ))
                ?>
        </div>
        <div class="navig_bar">
            <p>Menu</p>
            <p>Menu</p>
            <p>Menu</p>
            <p>Menu</p>
        </div>
        <div class="center_container">

            <div class="center_newslist">
                <?php
                for($i = 0;$i<50;++$i){
                    
                }
                ?>

            </div>
        </div>
    </body>
</html>