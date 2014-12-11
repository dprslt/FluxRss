<?php

namespace config;

class Validation {

static function val_action($action) {

if (!isset($action)) { throw new Exception('pas d\'action');}

}

static function val_form($nom,$age,&$dVueEreur) {

if (!isset($nom)||$nom=="") {
$dVueEreur[] =	"pas de nom";
$nom="";
}

if (!isset($age)||$age=="") {
$dVueEreur[] =	"pas d'age ";
$age=0;
}

}

}
?>

