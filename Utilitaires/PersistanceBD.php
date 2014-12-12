<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 10/12/2014
 * Time: 21:50
 */

namespace utilitaires;


use metier\News;
use PDO;
use \utilitaires\Persistance;

class PersistanceBD extends Persistance {

    public function ajouterFlux($name, $link)
    {
        $bd = BD::getInstance();
        $params = array(
            '1' => array($name, PDO::PARAM_STR),
            '2' => array($link, PDO::PARAM_STR),
        );
        $bd->requete("INSERT INTO tflux VALUES(NULL, ?, ?)",$params);
    }

    public function getNews($page)
    {
        $bd = BD::getInstance();
        $params = array(
            '1' => array($page-1, PDO::PARAM_INT),
            '2' => array(50, PDO::PARAM_INT),
        );
        //Requete avec jointure, pour recuperer les images
        $result = $bd->lecture("SELECT * FROM  `tnews` ORDER BY datePub LIMIT ?, ?",$params);
        $tabNews = array();
        foreach($result as $news){
            $tabNews[] = new News($news['id'],$news['flux'],
                            $news['title'],$news['url'],
                            $news['guid'],$news['description'],
                            $news['datePub'],$news['dateAjout']
            );
        }
        return $tabNews;
    }

    public function getFlux($page){
        $bd = BD::getInstance();
        $params = array(
            '1' => array($page, PDO::PARAM_INT),
            '2' => array(($page -1)*50, PDO::PARAM_INT),
        );
        //Requete avec jointure, pour recuperer les images
        $result = $bd->lecture("SELECT * FROM  `tflux` LIMIT ?, ?",$params);
        $tabFlux = array();
        foreach($result as $flux){
            $tabFlux[$flux['id']] = new Flux($flux['id'],$flux['title'],$flux['path'],$flux['link'],
                $flux['description'],$flux['image_url'],
                $flux['image_titre'],$flux['image_link']);
        }
        return $tabFlux;
    }
}