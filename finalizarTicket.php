<?php

	session_start();	
	
	$logado = $_SESSION['nome'];
	
	if($logado != "Byte OS"){
		header('location: index.php');
	}

$idTicket = $_REQUEST['idTicket'];

	include "conecta.php";	
	
		$con = "SELECT * FROM tb_ticket WHERE id_ticket ='$idTicket'";
		
		$res = $link->query($con);
	
	if ($res->num_rows == 0) {
	
		echo "<script>alert('Ticket não encontrado!!!');window.location=('procurar.php');</script>";
	} 
	
		else{ ?>
		

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<title>Finalizar Ticket</title>
		<link href="css/estilos.css" rel="stylesheet" />
		<script type="text/javascript" src="js/javascript.js"></script>
		<!--[if lt IE 11]> <meta http-equiv="X-UA-Compatible" content="IE=8"/> <![endif]-->
	</head>
	
<body>

	<div id="conteudoArea">

			<div id="conteudo">

				<h1>Finalizar Chamado</h1>	
	
					<table>
							<tr>
								<th>Nome da Empresa</th>
								<th>N° do Ticket</th>
								<th>Equipamento</th>
								<th>Cód. Equipamento</th>
								<th>Solicitante</th>
								<th>Setor</th>
								<th>Data de Abertura</th>
								<th>Hora de Abertura</th>
								<th>Situação</th>
								<th>Data de Encerramento</th>
								<th>Hora de Encerramento</th>
								
							</tr>

<?php
	while($reg = $res->fetch_array()){

		if($reg['te_situacao'] == 'Em Aberto'){
			$cor = 'bgcolor="#FF6347"';
		}  if($reg['te_situacao'] == 'Encerrada'){
			$cor = 'bgcolor="#98FB98"';
		}
	
	$defeito = $reg['te_defeitoRelatado'];

		echo	"<tr>
				<td>".$logado."</td>
				<td>".$reg['id_ticket']."</td>
				<td>".$reg['nm_equipamento']."</td>
				<td>".$reg['nu_codEquipamento']."</td>
				<td>".$reg['nm_solicitante']."</td>
				<td>".$reg['nm_setor']."</td>
				<td>".$reg['dt_dataAberto']."</td>
				<td>".$reg['hr_horaAberto']."</td>
				<td ".$cor.">".$reg['te_situacao']."</td>
				<td>".$reg['dt_dataFechado']."</td>
				<td>".$reg['hr_horaFechado']."</td>";
		
	}
	}	
$link->close();
?>
	
	
					</table><br />

						<hr><h3 style="color:red">Defeito Relatado:</h3><p><?php echo $defeito;?></p><hr>

							<form method="post" action="finalizado.php?idTicket=<?php echo $idTicket;?>">
	
								<label for="defeitoRelatado" class="area">Serviço Realizado:</label>
								<textarea id="servicoRealizado" name="servicoRealizado" class="inputAll" rows="8" cols="50" placeholder="Descreva o atendimento..."></textarea>	<br /><br /> 

								<label for="solicitante">Técnico</label>
								<input type="text" id="tecnico" name="tecnico" class="inputAll" required/>	<br /><br />
									
								<input type="submit" name="submit" value="Finalizar" class="buttonAll"/>
								<input type="reset" name="reset" value="Limpar" class="buttonAll"/>
								<a href="procurar.php"><button type="button" class="buttonAll">Voltar</button></a>
	
							</form>
			</div>
	</div>

<?php include "menu.php" ?>

</body>
</html>