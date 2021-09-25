<?php

date_default_timezone_set ("America/Sao_Paulo");

$data = date("d/m/20y", time());

$timestamp = mktime(date("H")-3, date("i"));
$hora = gmdate("H:i", $timestamp);

?>