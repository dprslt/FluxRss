<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    //require("Controleur/userControl.php");
    //require("test.php");


    include ("Config/config.php");
    require("ParserExemple/appel.php");
    exit();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
    </head>
    <body>
        <a href=".?action=tet">TEST</a>
        <form action="connexion.php" method="post">
            <input type="text" name="NomUtilisateur" placeholder="Login" required/>
            <input type="password" name="MotDePasse" placeholder="Password" required/>
            <input type="submit" value="Se connecter" />
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
