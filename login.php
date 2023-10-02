<?php	/* Desenvolvido por Tiago Rodrigues */
session_start();

$nome = $_POST['nome'];
$senha = $_POST['senha'];

include "conecta.php";

$sql = "SELECT * FROM tb_empresa WHERE nm_usuario = ? AND pw_senha = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param('ss',$nome,$senha);
$stmt->execute();
$res = $stmt->get_result();

while($reg = $res->fetch_array()){

$empresa = $reg['nm_empresa'];

}

if ($res->num_rows > 0) {

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