<?php
    $templateFlux = $twig->loadTemplate('Flux.twig');
    $templateNews = $twig->loadTemplate('News.twig');
?>

<div class="center_container">
    <div class="center_newslist">
        <?php
            
            echo $templateFlux->render(array(
            'Flux' => array()
            ));
      
            echo $templateNews->render(array(
            'News' => array()
            ))
        ?>

    </div>
</div>