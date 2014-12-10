<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BD
 *
 * @author Charlotte DELAIN, Théo DEPRESLE
 */
class BD {
    private $pdo = null;

    
    private function __construct() {
        try{
        
            global $db_host,$db_name, $db_password,$db_user;
            $params = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET Names UTF8");
            //$pdo = new PDO("mysql:host=".$db_host.";dbname=".$db_name,$db_user,$db_password,$params);

            $this->pdo = new PDO("mysql:host=".$db_host.";dbname=".$db_name,$db_user,$db_password,$params);
            //Léve une exception en cas d'erreur
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
            //die("Erreur connexion");
        }
        
    }

    private static $instance = null;
    
    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new self;
        }
        return self::$instance;
    }


    public function lecture($req, $params){
       try{
          $requete = $this->pdo->prepare($req);
          $i=0;
          foreach($params as $param){
                $i++;
                $requete->bindParam($i, $param[0],$param[1]);
          }
          $requete->execute();
          $result = $requete->fetchall();
          return $result;
       }
       catch (PDOException $e){
            throw new Exception("Erreur de lecture BD, requete invalide ?");
       }
   }
   
   public function requete($req, $params){
       try{
          $requete = $this->pdo->prepare($req);
          $i=0;
          foreach($params as $param){
                $i++;
                $requete->bindParam($i, $param[0],$param[1]);
          }
          $requete->execute();
       }
        catch (PDOException $e){
            $tabErreur[] = "Erreur de requete BD";
        }
       return;
   }
}
