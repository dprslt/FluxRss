<?php
    $template = $twig->loadTemplate('Flux.twig');
?>

<div class="center_container">

    <div class="center_newslist">
            <?=
                $template->render(array(
                'Flux' => array()
                ))
            ?>

    </div>
</div>