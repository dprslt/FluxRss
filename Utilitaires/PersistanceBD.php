<?php


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
        $result = $bd->lecture("SELECT COUNT(*) AS nb FROM tAdmin WHERE login = ? AND mdp = ?", $params);
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
        $bd->requete("UPDATE `tflux` SET `title`=?,`path`=?,`link`=?,`description`=?,`image_url`=?,`image_titre`=?,`image_link`=? WHERE `id`= ?",$params);
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
        global $nbNewsPage;
        $bd = BD::getInstance();
        $params = array(
            '1' => array(($page-1)*$nbNewsPage, PDO::PARAM_INT),
            '2' => array($nbNewsPage, PDO::PARAM_INT),
        );
        $result = $bd->lecture("SELECT * FROM `tnews` ORDER BY dateAjout DESC LIMIT ?, ?",$params);
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

    public function getNewsFlux($flux,$page)
    {
        global $nbNewsPage;
        $bd = BD::getInstance();
        $params = array(
            '1' => array($flux, PDO::PARAM_INT),
            '2' => array(($page-1)*$nbNewsPage, PDO::PARAM_INT),
            '3' => array($nbNewsPage, PDO::PARAM_INT),
        );
        $result = $bd->lecture("SELECT * FROM `tnews` WHERE flux = ? ORDER BY dateAjout DESC LIMIT ?, ?", $params);
        
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
        global $nbFluxPage;
        $bd = BD::getInstance();
        $params = array(
            '1' => array(($page-1)*$nbFluxPage, PDO::PARAM_INT),
            '2' => array(($page)*$nbFluxPage, PDO::PARAM_INT),
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

    public function getFluxById($id)
    {
        $bd = BD::getInstance();
        Validation::isNumber($id);
        $params = array(
            '1' => array($id, PDO::PARAM_INT),
        );
        $result = $bd->lecture("SELECT * FROM  `tflux` WHERE `id` = ?", $params);
        return $this->tabFluxFromRequest($result,false);
    }

    public function getListFlux(){
        $bd = BD::getInstance();
        $result = $bd->lecture("SELECT * FROM  `tflux`", array());
        return $this->tabFluxFromRequest($result);
    }

    public function viderNews(){
        $bd = BD::getInstance();
        $bd->requete("DELETE FROM `tnews`",array());
    }

    public function supprimerFlux($id){
        $bd = BD::getInstance();
        $bd->requete("DELETE FROM `tnews` WHERE flux = ?", array(
            '1' => array($id, PDO::PARAM_INT),
        ));
        $bd->requete("DELETE FROM `tflux` WHERE id = ?", array(
            '1' => array($id, PDO::PARAM_INT),
        ));
    }

    public function getNbNewsOfFlux($flux)
    {
        $bd = BD::getInstance();
        $result = $bd->lecture("SELECT COUNT(*) AS 'count' FROM `tnews` WHERE flux = ?", array(
            '1' => array($flux, PDO::PARAM_INT),
        ));
        return $result[0]['count'];
    }

    /*----- Private -----*/
    private function tabFluxFromRequest($tabResult,$index = true) {
        $tabFlux = array();
        foreach($tabResult as $flux){
            if($index)
                $tabFlux[$flux['id']] = new Flux($flux['id'],$flux['title'],$flux['path'],$flux['link'],
                    $flux['description'],$flux['image_url'],
                    $flux['image_titre'],$flux['image_link']);
            else
                $tabFlux[] = new Flux($flux['id'],$flux['title'],$flux['path'],$flux['link'],
                    $flux['description'],$flux['image_url'],
                    $flux['image_titre'],$flux['image_link']);
        }
        return $tabFlux;
    }



}