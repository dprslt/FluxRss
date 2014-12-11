<?php

class Validation {

static function val_action($action) {

if (!isset($action)) {
throw new Exception('pas d\'action');
}
}

static function val_form($nom,$age,&$dataVueEreur) {
$b=TRUE;
if (!isset($nom)||$nom=="") {
$dataVueEreur[] ="pas de nom";
$b=FALSE;
throw new Exception('pas d\'action');
}

if (!isset($age)||$age=="") {
$dataVueEreur[] ="pas d'age ";
$b=FALSE;
}

return $b;
}

}
?>

