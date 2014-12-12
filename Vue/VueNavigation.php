<?php
    $template = $twig->loadTemplate('News.twig');
?>
<div class="navig_bar">
    <h2>Menu</h2>
    <a href="?action=afficherNews">Toutes les news</a>
    <a href="?action=afficherFlux">Listes des flux</a>
    </br>
    <h2>Flux les plus actifs</h2>
    <?=
        $template->render(array(
            'Flux' => array()
        ))
    ?>
    
    <a href="?action=ajouterFlux">Ajouter flux</a>
    <a href="?action=supprimerFlux">Supprimer flux</a>
</div>