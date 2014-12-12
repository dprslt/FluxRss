<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 10/12/2014
 * Time: 19:24
 */
    //include_once('../lib/Twig/Autoloader.php');
    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('Vue/Templates'); // Dossier contenant les templates
    $twig = new Twig_Environment($loader, array(
        'cache' => false
    ));

    $template = $twig->loadTemplate('News.twig');
?>
<!DOCTYPE HTML>
<html>
<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="Vue/CSS/desktop.css"/>
    <header>

        <body>
        <div class="top_bar" >

        </div>
        <div class="navig_bar">
            <p>Menu</p>
            <p>Menu</p>
            <p>Menu</p>
            <p>Menu</p>
        </div>
        <div class="center_container">

            <div class="center_newslist">
                <?=
                $template->render(array(
                    'News' => $newstab
                ))
                ?>

            </div>
        </div>
        </body>
</html>