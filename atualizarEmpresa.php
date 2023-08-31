<?php	/* Desenvolvido por Tiago Rodrigues */

	session_start();	
	
	$logado = $_SESSION['nome'];
	
	if($logado != "Byte OS"){
		header('location: index.php');
	}

$idEmpresa = $_POST['idEmpresa'];
$logradouro = $_POST['logradouro'];
$logNumero = $_POST['logNumero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$cep = $_POST['cep'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$contato = $_POST['contato'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];


include "conecta.php";
		
	$sql = "UPDATE tb_empresa SET
	te_logradouro = '$logradouro',
	nu_logNumero = '$logNumero',
	nm_bairro = '$bairro',
	nm_cidade = '$cidade',
	sl_uf = '$uf',
	nu_cep = '$cep',
	fn_empresa = '$telefone',
	te_email = '$email',
	nm_contato = '$contato',
	nm_usuario = '$usuario',
	pw_senha = '$senha'
	WHERE id_empresa = '$idEmpresa'";

	$res = $link->query($sql);
	
$link->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Alterado</title>
		<link href="css/estilos.css" rel="stylesheet" />
		<script type="text/javascript" src="js/javascript.js"></script>
		<!--[if lt IE 11]> <meta http-equiv="X-UA-Compatible" content="IE=8"/> <![endif]-->
	</head>

<body>

	<div id="conteudoArea">

		<div id="conteudo">

			<h1>Empresa atualizada com Sucesso!</h1>
	
		</div>

	</div>

<?php include "menu.php" ?>
</body>
</html>