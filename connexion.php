<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Validation.php';

try {
    Validation::utilisateurValid($_POST['NomUtilisateur']);
} catch (Exception $exc) {
    echo $exc->getMessage();
}

try {
    Validation::passwordValid($_POST['MotDePasse']);
} catch (Exception $exc) {
    echo $exc->getMessage();
}

?>
