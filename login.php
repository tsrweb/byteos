<?php	/* Desenvolvido por Tiago Rodrigues */
session_start();

$nome = $_POST['nome'];
$senha = $_POST['senha'];

include "conecta.php";

$con = $link->query("SELECT * FROM tb_empresa WHERE nm_usuario = '$nome' AND pw_senha = '$senha'");

while($reg = $con->fetch_array()){

$empresa = $reg['nm_empresa'];

}

if ($con->num_rows > 0) {	

	$_SESSION['nome'] = $empresa ;
	header('location: sistema.php');
	} 
	else{
	unset($_SESSION['nome']);
	$_SESSION['erro'] = '<style>#erroLogin {visibility: visible; color: #FF0000; font-size: 15px;} </style>';
	header('location: index.php');
	}

$link->close();
?>