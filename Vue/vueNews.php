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

    require '../Metier/Flux.php';
    require '../Metier/News.php';

    $template = $twig->loadTemplate('News.twig');
    
    $Flux = new Flux();
    $News = new News(2, 'titre de la news', 'description blablabla', 'https://github.com/', $Flux);
    $News2 = new News(4, 'titre de la news 2', 'description blablabla', 'https://google.com/', $Flux);
?>
<!DOCTYPE HTML>
<html>
<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="CSS/desktop.css"/>
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
                'News' => array($News,$News2)
            ))
                ?>

            </div>
        </div>
    </body>
</html>