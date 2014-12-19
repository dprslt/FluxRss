<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 18/12/2014
 * Time: 10:46
 */

namespace modele;


use utilitaires\PersistanceBD;
use utilitaires\Boniche;
use metier\Admin;

class AdminModele {
    public function __construct(){
    }

    public function isAdmin(){
       
        $role = $_SESSION['role'];
        $login = $_SESSION['login'];
        
        $login = Boniche::NettoyageLOGIN($login);
        $mdp = Boniche::NettoyageMDP($mdp);
        
        if(isset($role)&&isset($login)&&$role=='admin'){
            return new Admin($role, $login);
        }
        else {return null;}
    }
    
    public function connecter($login, $mdp){        
        $dal = new PersistanceBD();
        $result = $dal->authentifier("r");
        
        if($result == 1){
            $_SESSION['role']='admin';
            $_SESSION['login']=$login;
        }
    }
    
    public function deconnecter(){
        unset($_SESSION);
        session_destroy();
    }
} 