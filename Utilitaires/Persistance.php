<?php

/**
 * Class Persistance
 * @author Charlotte DELAIN, Théo DEPRESLE
 */

namespace utilitaires;

abstract class  Persistance {
    public abstract function ajouterFlux($link);
    public abstract function ajouterNews($news);

    public abstract function getNbFlux();
    public abstract function getPageFluxs($page);
    public abstract function getFluxs();
    public abstract function getNbNews();
    public abstract function getNewsFlux($flux);
    public abstract function getNews($page);
} 