<?php

    if(isset($_GET['mot'])){
        echo md5($_GET['mot']);
    }

?>
    <form  method="get">
        <input type="text" placeholder="Mot" name="mot" />
        <input type="submit"/>
    </form>
