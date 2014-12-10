<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 10/12/2014
 * Time: 21:50
 */

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
}