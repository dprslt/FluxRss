<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 10/12/2014
 * Time: 19:29
 */
        $page = "";
    if(isset($_GET['page']))
        $page = $_GET['page'];
?>

<!DOCTYPE HTML>
<html>
<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</header>

        <body style="margin: 0">
            <iframe id="frame" name="page" src="<?= $page?>" style="border: none;position: absolute;top: 0;width: 100%;bottom: 0;height: 100%"></iframe>

            <script type="text/javascript">
                var frame = document.getElementById('frame');
                frame.onload = function () {
                    console.log("refresh !");
                    setTimeout(function() {
                        document.getElementById('frame').contentWindow.location.reload();
                    },1000);
                };
            </script>
        </body>
</html>