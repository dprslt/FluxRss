<?php

class Validation {
    
    public static function existe($var){
        if(!isset($var)){
            throw new Exception("Variable inexistante");
        }
    }
    
    public static function nonVide($var){
        if(empty($var)){
            throw  new Exception("Variable vide");
        }
    }
  
    public static function utilisateurValid($utilisateur){
        Validation::existe($utilisateur);
        Validation::nonVide($utilisateur);
        
        $specialChar = preg_match('@[-!$%^&*()_+|~=`{}\[\]:";\'<>?,.\/]@', $utilisateur);

        if($specialChar || strlen($utilisateur) < 3) {
            throw new Exception("Nom d'utilisateur invalide. Il ne doit pas "
                    . "contenir de caractères spéciaux et doit contenir plus de trois caractères.");
        }
          
    }
    
    public static function passwordValid($password){
        Validation::existe($password);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);


        if(!$uppercase || !$lowercase || !$number || strlen($password) < 6) {
            throw new Exception("Mot de passe invalide. Il doit contenir un "
                    . "chiffre, une lettre minuscule, une lettre majuscule et "
                    . "au moins 6 caractères");
        }
    }
    
    
    public static function URLValid($url){
        if(Validation::existe($url) && Validation::nonVide($url)){
            if(filter_var($url,FILTER_VALIDATE_URL) == FALSE){
                throw new Exception("URL invalide.");
            }
        }
    }
    
    public static function idValid($id){
        //A completer en fonction des choix fait en BD.
        
    }
        
}
