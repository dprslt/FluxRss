<?php

/**
 * Class Persistance
 * @author Charlotte DELAIN, Théo DEPRESLE
 */

namespace utilitaires;

abstract class  Persistance {
    public abstract function ajouterNouveauFlux($link);
    public abstract function enregistrerFlux($flux);
    public abstract function ajouterNews($news);

    public abstract function getNbFlux();
    public abstract function getPageFluxs($page);
    public abstract function getFluxById($id);
    public abstract function getNbNews();
    public abstract function getNewsFlux($flux,$page);
    public abstract function getNews($page);
    public abstract function viderNews();
} 