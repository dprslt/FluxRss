<?php

namespace metier;

class Admin {
    private $role;
    private $login;

    public function __construct($role, $login){
        $this->role = $role;
        $this->login = $login;   
    }
    
        public function getrole()
    {
        return $this->role;
    }
    
        public function getlogin()
    {
        return $this->login;
    }
    
    
}