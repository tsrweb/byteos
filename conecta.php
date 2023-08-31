<?php
$host       = 'localhost';
$user       = 'root';
$password   = 'pa8LFn5$t$8Bu7';
$db         = 'db_byteos';

$link = new Mysqli($host, $user, $password, $db);
if($link->connect_error)
	die('Erro de conexão');
?>