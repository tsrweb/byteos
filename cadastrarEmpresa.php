<?php	/* Desenvolvido por Tiago Rodrigues */

	session_start();	
	
	$logado = $_SESSION['nome'];
	
	if($logado != "Byte OS"){
		header('location: index.php');
	}

$empresa = $_POST['empresa'];
$cnpj = $_POST['cnpj'];
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
	
	$sql = "INSERT INTO tb_empresa (
		nm_empresa,
		nu_cnpj,
		te_logradouro,
		nu_logNumero,
		nm_bairro,
		nm_cidade,
		sl_uf,
		nu_cep,
		fn_empresa,
		te_email,
		nm_contato,
		nm_usuario,
		pw_senha)
		VALUES (
		'$empresa',
		'$cnpj',
		'$logradouro',
		'$logNumero',
		'$bairro',
		'$cidade',
		'$uf',
		'$cep',
		'$telefone',
		'$email',
		'$contato',
		'$usuario',
		'$senha')";
	$res = $link->query($sql);
	
$link->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<meta charset="utf-8">
		<title>procurar</title>
		<link href="css/estilos.css" rel="stylesheet" />
		<script type="text/javascript" src="js/javascript.js"></script>
		<!--[if lt IE 11]> <meta http-equiv="X-UA-Compatible" content="IE=8"/> <![endif]-->
	</head>

<body>

<div id="conteudoArea">

	<div id="conteudo">

		<h1>Empresa cadastrada com Sucesso!</h1>

	</div>

</div>

<?php include "menu.php" ?>
</body>
</html>