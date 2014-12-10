<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 10/12/2014
 * Time: 21:42
 */

class FluxModele {
    public function ajouterFlux($name, $link){
        Boniche::NettoyageURL($link);
        Boniche::NettoyageBDD($link);
        Boniche::NettoyageBDD($name);

        $dal = new PersistanceBD();
        $dal->ajouterFlux($name,$link);
    }
} 