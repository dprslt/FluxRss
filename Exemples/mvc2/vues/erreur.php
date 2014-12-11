
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head><title>Erreur</title>
</head>

<body>

<h1>ERREUR !!!!!</h1>
<?php
if (isset($dVueEreur)) {
foreach ($dVueEreur as $value){
    echo $value;
}
}
?>



</body> </html>