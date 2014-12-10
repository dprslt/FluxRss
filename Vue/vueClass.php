<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 10/12/2014
 * Time: 19:24
 */
?>
<!DOCTYPE HTML>
<html>
<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="CSS/desktop.css"/>
<header>

    <body>
        <div class="top_bar" >

        </div>
        <div class="navig_bar">
            <p>Menu</p>
            <p>Menu</p>
            <p>Menu</p>
            <p>Menu</p>
        </div>
        <div class="center_container">

            <div class="center_newslist">
                <?php
                for($i = 0;$i<50;++$i){
                    echo '
                        <div class="center_news">
                            <div class="time_indicator_on"></div>
                            <a href="http://google.com">google.comeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee</a>
                            <span> - 21:20 10 déc 2014</span>
                        </div>
                    ';
                }
                ?>

            </div>
        </div>

    </body>
</html>