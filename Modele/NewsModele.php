<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 11/12/2014
 * Time: 11:36
 */

class NewsModele {

    public function getPageNews($page)
    {
        $dal = new PersistanceBD();
        return $dal->getNews($page);
    }
}