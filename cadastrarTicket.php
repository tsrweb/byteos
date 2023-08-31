<?php	/* Desenvolvido por Tiago Rodrigues */

	session_start();

	if((!isset($_SESSION['nome']))){
		header('location: index.php');
	}

	$logado = $_SESSION['nome'];	
	
	if($logado != "Byte OS"){
		echo "<style>#adm{display: none;}</style>";
	}

$equipamento = $_POST['equipamento'];
$marcaModelo = $_POST['marcaModelo'];
$codEquip = $_POST['codEquip'];
$defeitoRelatado = $_POST['defeitoRelatado'];
$solicitante = $_POST['solicitante'];
$setor = $_POST['setor'];
$fnSolicitante = $_POST['fnSolicitante'];
$situacao = "Em Aberto";

include "conecta.php";
	
include 'dataHora.php';

	$con = "SELECT * FROM tb_empresa WHERE nm_empresa = '$logado'";
	$ret = $link->query($con);

	while($reg = $ret->fetch_array()){
		$idEmpresa = $reg['id_empresa'];
		$emailLogado = $reg['te_email'];
	}

	$sql = "INSERT INTO tb_ticket(
		id_empresa,
		nm_equipamento,
		te_marcaModelo,
		nu_codEquipamento,
		te_defeitoRelatado,
		nm_solicitante,
		nm_setor,
		fn_solicitante,
		dt_dataAberto,
		hr_horaAberto,
		te_situacao)
		VALUES (
		'$idEmpresa',
		'$equipamento',
		'$marcaModelo',
		'$codEquip',
		'$defeitoRelatado',
		'$solicitante',
		'$setor',
		'$fnSolicitante',
		'$data',
		'$hora',
		'$situacao')";

	$res = $link->query($sql);
	
	$ultimo = $link->insert_id;
	
$link->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Novo Ticket</title>
		<link href="css/estilos.css" rel="stylesheet" />
		<script type="text/javascript" src="js/javascript.js"></script>
		<!--[if lt IE 11]> <meta http-equiv="X-UA-Compatible" content="IE=8"/> <![endif]-->
	</head>

<body>

<div id="conteudoArea">

	<div id="conteudo">

		<h1>Ticket Aberto com Sucesso!!!</h1>
			<h2>Ticket de ID: <?php echo $ultimo ?></h2>
				<a href="visualisarTicket.php?idTicket=<?php echo $ultimo;?>" target="_blank">Clique aqui para visualisar seu Ticket</a>
						
	</div>

</div>

<?php include "menu.php" ?>
</body>
</html>

<!-- Envio do Email -->

<?php

$corpo = '

<!DOCTYPE html>
<html lang="pt-br">
<meta charset="utf-8">

<head>
	<title>Email Send</title>
</head>

<body style="font-family: Calibri; background-color: #DDD; min-height: 630px;">	

<table style="width: 100%;">
	<tr>
		<td>

<table style="background-color: #FFF; width: 600px; height: auto; margin-left: auto; margin-right: auto; margin-top: 20px; border: 1px #26C9FF solid;">
	<tr>
		<td style="height: 120px; text-align: center;"><img src="http://byteos.com.br/suporte/img/logoEmail.png"></td>
			</tr>

	<tr>
		<td style="background-color: #CCCCCC; height: 40px; text-align: center; font-size: 25px; font-weight: bolder;">Ticket de N° '.$ultimo.'</td>
			</tr>

	<tr>
		<td style="padding: 5px 10px; font-size: 18px;">
			<strong>Empresa:</strong> '.$logado.'<br />
			<strong>Solicitante:</strong> '.$solicitante.'<br />
			<strong>Setor:</strong> '.$setor.'<br />
			<strong>Telefone:</strong> '.$fnSolicitante.'<br />
		</td>
	</tr>

	<tr>
		<td style="padding: 5px 10px; font-size: 18px;">
			<strong>Equipamento:</strong> '.$equipamento.'<br />
			<strong>Marca / Modelo:</strong> '.$marcaModelo.'<br />
			<strong>Código / Serial:</strong> '.$codEquip.'<br />
		</td>
	</tr>

	<tr>
		<td style="padding: 5px 10px; font-size: 18px;">
			<strong>Defeito Relatado:</strong><br />
			'.$defeitoRelatado.'
		</td>
	</tr>

	<tr>
		<td style="text-align: center; height: 80px;"><a href="http://byteos.com.br/suporte" target="_blank" style="text-decoration: none; padding: 13px 20px; border-radius: 10px; background-color: #0000FF; color: #FFF; font-size: 18px">Visualizar no Sistema</a>
		</td>
	</tr>

	<tr style="background-color: #FFFF00;">
		<td style="text-align: center; font-size: 25px; font-weight: bolder; padding: 6px 0px 10px;"><a href="http://byteos.com.br" target="_blank" style="text-decoration: none; color: #000;">www.byteos.com.br</a>
			</td>
				</tr>
</table>
	</td>
		</tr>
</table>
</body>	
</html>

';

$para = $emailLogado;
$assunto = "Abertura de Ticket ID: ".$ultimo."";
$menssagem = $corpo;
$cabecalho = "MIME-Version: 1.0" . "\r\n";
$cabecalho .= "Content-type: text/html; charset=ISO 8859-1" . "\r\n";
$cabecalho .= "from: Suporte ByteOS<suporte@byteos.com.br>" . "\r\n" . "Reply-to: suporte@byteos.com.br" . "\r\n" . "Bcc: suporte@byteos.com.br" . "\r\n" . "Bcc: vendas@byteos.com.br" . "\r\n" . "Bcc: ootavianos@hotmail.com" . "\r\n";
mail($para, $assunto, $menssagem, $cabecalho);

?>

