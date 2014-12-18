<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 10/12/2014
 * Time: 21:50
 */

namespace utilitaires;


use metier\Flux;
use metier\News;
use PDO;
use \utilitaires\Persistance;

class PersistanceBD extends Persistance {

    public function ajouterNouveauFlux($link)
    {
        $bd = BD::getInstance();
        $params = array(
            '1' => array($link, PDO::PARAM_STR),
        );
        $bd->requete("INSERT INTO `tflux`(path) VALUES (?)",$params);
    }

    public function authentifier($admin, $pass){
        $bd = BD::getInstance();
        $params = array(
            '1' => array($admin, PDO::PARAM_STR),
            '2' => array($pass, PDO::PARAM_STR)
        );
        $result = $bd->lecture("SELECT COUNT(*) AS nb FROM users WHERE login = ? AND pass = ?", $params);
        return $result[0]['nb'];
    }

    public function enregistrerFlux($flux){
        $bd = BD::getInstance();
        $params = array(
            '1' => array($flux->getTitle(), PDO::PARAM_STR),
            '2' => array($flux->getPath(), PDO::PARAM_STR),
            '3' => array($flux->getLink(), PDO::PARAM_STR),
            '4' => array($flux->getDescription(), PDO::PARAM_STR),
            '5' => array($flux->getImageUrl(), PDO::PARAM_STR),
            '6' => array($flux->getImageTitre(), PDO::PARAM_STR),
            '7' => array($flux->getImageLink(), PDO::PARAM_STR),
            '8' => array($flux->getId(), PDO::PARAM_INT)
        );
        $bd->requete("UPDATE `tflux` SET `title`=?,`path`=?,`link`=?,`descripton`=?,`image_url`=?,`image_titre`=?,`image_link`=? WHERE `id`= ?",$params);
    }

    public function ajouterNews($news){
        if(!($news instanceof News)){
            throw new \Exception("DAL : Objet news invalide");
        }
        $bd = BD::getInstance();
        $params = array(
            '1' => array($news->getFlux(), PDO::PARAM_INT),
            '2' => array($news->getTitle(), PDO::PARAM_STR),
            '3' => array($news->getUrl(), PDO::PARAM_STR),
            '4' => array($news->getGuid(), PDO::PARAM_STR),
            '5' => array($news->getDescription(), PDO::PARAM_STR),
            '6' => array($news->getDatePub(), PDO::PARAM_STR),
            '7' => array($news->getDateAjout(), PDO::PARAM_STR)
        );
        $bd->requete("INSERT INTO tnews VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)",$params);
    }


    public function getNews($page)
    {
        $bd = BD::getInstance();
        $params = array(
            '1' => array($page-1, PDO::PARAM_INT),
            '2' => array(50, PDO::PARAM_INT),
        );
        $result = $bd->lecture("SELECT * FROM  `tnews` ORDER BY datePub LIMIT ?, ?",$params);
        $tabNews = array();
        foreach($result as $news){
            $tabNews[] = new News($news['id'],$news['flux'],
                            $news['title'],$news['url'],
                            $news['guid'],html_entity_decode($news['description']),
                            $news['datePub'],$news['dateAjout']
            );
        }
        return $tabNews;
    }

    public function getNewsFlux($flux)
    {
        $bd = BD::getInstance();
        $params = array(
          '1' => array($flux, PDO::PARAM_INT)
        );
        $result = $bd->lecture("SELECT COUNT(*) AS 'count' FROM `tnews` WHERE flux = ?", $params);

        $tabNews = array();
        foreach($result as $news){
            $tabNews[] = new News($news['id'],$news['flux'],
                $news['title'],$news['url'],
                $news['guid'],html_entity_decode($news['description']),
                $news['datePub'],$news['dateAjout']
            );
        }

        return $tabNews;
    }

    public function getNbNews(){
        $bd = BD::getInstance();
        $result = $bd->lecture("SELECT COUNT(*) AS 'count' FROM `tnews` ",array());
        //1Ligne de résultat est retourné, on prend la 1ere, puis la bonne colonne.
        return $result[0]['count'];
    }

    public function getPageFluxs($page){
        $bd = BD::getInstance();
        $params = array(
            '1' => array(($page-1)*20, PDO::PARAM_INT),
            '2' => array(($page)*20, PDO::PARAM_INT),
        );
        $result = $bd->lecture("SELECT * FROM  `tflux` LIMIT ?, ?",$params);
        return $this->tabFluxFromRequest($result);
    }

    public function getNbFlux(){
        $bd = BD::getInstance();
        $result = $bd->lecture("SELECT COUNT(*) AS 'count' FROM `tflux` ",array());
        //1Ligne de résultat est retourné, on prend la 1ere, puis la bonne colonne.
        return $result[0]['count'];
    }

    public function getFluxs()
    {
        $bd = BD::getInstance();
        $result = $bd->lecture("SELECT * FROM  `tflux` LIMIT ?, ?", array());
        return $this->tabFluxFromRequest($result);
    }





    /*----- Private -----*/
    private function tabFluxFromRequest($tabResult) {
        $tabFlux = array();
        foreach($tabResult as $flux){
            $tabFlux[$flux['id']] = new Flux($flux['id'],$flux['title'],$flux['path'],$flux['link'],
                $flux['description'],$flux['image_url'],
                $flux['image_titre'],$flux['image_link']);
        }
        return $tabFlux;
    }
}