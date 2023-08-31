<?php	/* Desenvolvido por Tiago Rodrigues */

	session_start();	
	
	$logado = $_SESSION['nome'];
	
	if($logado != "Byte OS"){
		header('location: index.php');
	}

$idTicket = $_GET['idTicket'];
$servicoRealizado = $_POST['servicoRealizado'];
$tecnico = $_POST['tecnico'];
$situacao = "Encerrada";


include "conecta.php";
	
include "dataHora.php";
	
	$sql = "UPDATE tb_ticket SET
	te_servicoRealizado = '$servicoRealizado',
	nm_tecnico = '$tecnico',
	te_situacao = '$situacao',
	dt_dataFechado = '$data',
	hr_horaFechado = '$hora'
	WHERE id_ticket = '$idTicket'";

	$res = $link->query($sql);
	
$link->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Finalizado</title>
		<link href="css/estilos.css" rel="stylesheet" />
		<script type="text/javascript" src="js/javascript.js"></script>
		<!--[if lt IE 11]> <meta http-equiv="X-UA-Compatible" content="IE=8"/> <![endif]-->
	</head>

<body>

	<div id="conteudoArea">

		<div id="conteudo">

			<h1>Ticket Encerrado com Sucesso!</h1>
			<a href="visualisarTicket.php?idTicket=<?php echo $idTicket;?>" target="_blank">Visualisar ou Imprimir</a>		
	
		</div>

	</div>

<?php include "menu.php" ?>
</body>
</html>

<!--- Envio do email -->

<?php

/* Coletado dados */

include "conecta.php";

$con1 = "SELECT * FROM tb_ticket WHERE id_ticket = '$idTicket'";
$res1 = ($link->query($con1));

while($reg1 = $res1->fetch_array()){

	$equipamento = $reg1['nm_equipamento'];
	$codEquip = $reg1['nu_codEquipamento'];
	$marcaModelo = $reg1['te_marcaModelo'];
	$defeitoRelatado = $reg1['te_defeitoRelatado'];
	$solicitante = $reg1['nm_solicitante'];
	$setor = $reg1['nm_setor'];
	$fnSolicitante = $reg1['fn_solicitante'];
	$dataAberto = $reg1['dt_dataAberto'];
	$dataFechado = $reg1['dt_dataFechado'];
	$horaAberto = $reg1['hr_horaAberto'];
	$horaFechado = $reg1['hr_horaFechado'];
	$idEmpresa = $reg1['id_empresa'];

}

$con2 = "SELECT * FROM tb_empresa WHERE id_empresa = '$idEmpresa'";
$res2 = $link->query($con2);

while($reg2 = $res2->fetch_array()){

	$empresa = $reg2['nm_empresa'];
	$emailEmpresa = $reg2['te_email'];

}
$link->close();

/* Fim */

/* Email */

$corpo = '

<!DOCTYPE html>
<html lang="pt-br">
<meta charset="utf-8">

<head>
	<title>Email Encer</title>
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
		<td style="background-color: #CCCCCC; height: 40px; text-align: center; font-size: 25px; font-weight: bolder;">Ticket de N° '.$idTicket.'</td>
			</tr>

	<tr>
		<td style="padding: 5px 10px; font-size: 18px;">
			<strong>Empresa:</strong> '.$empresa.'<br />
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
		<td style="padding: 5px 10px; font-size: 18px;">
			<strong>Serviço Realizado:</strong><br />
			'.$servicoRealizado.'
		</td>
	</tr>

	<tr>
		<td style="padding: 5px 10px; font-size: 18px;">
			<strong>Técnico Responsável:</strong> '.$tecnico.'<br />
			<strong>Data de Abertura:</strong> '.$dataAberto.'<br />
			<strong>Data de Encerramento:</strong> '.$dataFechado.'<br />
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

$para = $emailEmpresa;
$assunto = "Encerramento de Ticket ID: ".$idTicket."";
$menssagem = $corpo;
$cabecalho = "MIME-Version: 1.0" . "\r\n";
$cabecalho .= "Content-type: text/html; charset=ISO 8859-1" . "\r\n";
$cabecalho .= "from: Suporte ByteOS<suporte@byteos.com.br>" . "\r\n" . "Reply-to: suporte@byteos.com.br" . "\r\n" . "Bcc: suporte@byteos.com.br" . "\r\n" . "Bcc: vendas@byteos.com.br" . "\r\n" . "Bcc: ootavianos@hotmail.com" . "\r\n";
mail($para, $assunto, $menssagem, $cabecalho);


?>