<?php

	session_start();

	if((!isset($_SESSION['nome']))){
		header('location: index.php');
	}

	$logado = $_SESSION['nome'];	
	
	if($logado != "Byte OS"){
		echo "<style>#adm{display: none;}</style>";
	}


include "conecta.php";

	if($logado != "Byte OS"){

	$con1 = "SELECT * FROM tb_empresa WHERE nm_empresa = '$logado'";
	$res1 = $link->query($con1);

	while($reg1 = $res1->fetch_array()){
		$idEmpresa = $reg1['id_empresa'];
	}

	$con2 = "SELECT * FROM tb_ticket WHERE id_empresa='$idEmpresa' ORDER BY id_ticket DESC";
	
	$res = $link->query($con2);
}else{

	$con2 = "SELECT * FROM tb_ticket ORDER BY id_ticket DESC";

	$res = $link->query($con2);
}
	
	if ($res->num_rows == 0) {
	
		echo '<script type="text/javascript">alert("Você não possui Tickets registrados!");window.location=("sistema.php");</script>';
	
	} 
	
	else{ ?>
	
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Histórico</title>
		<link href="css/estilos.css" rel="stylesheet" />
		<script type="text/javascript" src="js/javascript.js"></script>
		<!--[if lt IE 11]> <meta http-equiv="X-UA-Compatible" content="IE=8"/> <![endif]-->
	</head>
	
		<div id="conteudoArea">

			<div id="conteudo">

					<h1>Histórico de Tickets</h1>	
	
						<table>
							<tr>
								<th>N° do Ticket</th>
								<?php if($logado == "Byte OS"){echo '<th>Empresa</th>';}?>
								<th>Equipamento</th>
								<th>Cód. Equipamento</th>
								<th>Solicitante</th>
								<th>Setor</th>
								<th>Telefone</th>
								<th>Data de Abertura</th>
								<th>Situação</th>
								<th>Data de Encerramento</th>
								<th colspan="2">Opções</th>								
							</tr>
<?php
	while($reg2 = $res->fetch_array()){

		if($reg2['te_situacao'] == 'Em Aberto'){
			$cor = 'bgcolor="#FF6347"';
		}  if($reg2['te_situacao'] == 'Encerrada'){
			$cor = 'bgcolor="#98FB98"';
		}
	
		echo	"<tr>
				<td>".$reg2['id_ticket']."</td>";

		/* Coletando nome da Empresa de acordo com o id da empresa contido no ticket e exibindo somente para o adm */

				$idEmpresa = $reg2['id_empresa'];
				$con3 = "SELECT * FROM tb_empresa WHERE id_empresa = '$idEmpresa'";
					$res3 = $link->query($con3);
						while($reg3 = $res3->fetch_array()){$nomeEmpresa = $reg3['nm_empresa'];};
					if($logado == "Byte OS"){echo "<td>".$nomeEmpresa."</td>";};

		/*  Fim da coleta */

		echo	"<td>".$reg2['nm_equipamento']."</td>
				<td>".$reg2['nu_codEquipamento']."</td>
				<td>".$reg2['nm_solicitante']."</td>
				<td>".$reg2['nm_setor']."</td>
				<td>".$reg2['fn_solicitante']."</td>
				<td>".$reg2['dt_dataAberto']."</td>
				<td ".$cor.">".$reg2['te_situacao']."</td>
				<td>".$reg2['dt_dataFechado']."</td>
				<td><a href='visualisarTicket.php?idTicket=".$reg2['id_ticket']."' target='_blank' ><button type='button' class='buttonAll'>Visualizar</button></a>";

				if($logado == "Byte OS" && $reg2['te_situacao'] == 'Em Aberto'){
				echo"<a href='finalizarTicket.php?idTicket=".$reg2['id_ticket']."' ><button type='button' class='buttonAll'>Encerrar</button></a></td></tr>";}
				else if($logado != "Byte OS"){echo"</td></tr>";};
		
}
		}/* Fim do else */
$link->close();
?>
						</table><br /><br />
			</div>
		</div>
<?php include "menu.php" ?>
</body>
</html>