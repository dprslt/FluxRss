<?php

    //require("Controleur/userControl.php");
    //require("test.php");


    use controleur\frontControl;

    session_start();
    require('Controleur/frontControl.php');
    $front = new frontControl();


?>