<?php

	session_start();

	if((!isset($_SESSION['nome']))){
		header('location: index.php');
	}

	$logado = $_SESSION['nome'];	
	
	if($logado != "Byte OS"){
		echo "<style>#adm{display: none;}</style>";
	}

$idTicket = $_POST['idTicket'];


include "conecta.php";
	
	if($logado != "Byte OS"){

	$con1 = "SELECT * FROM tb_empresa WHERE nm_empresa = '$logado'";
	$res1 = $link->query($con1);

	while($reg1 = $res1->fetch_array()){
		$idEmpresa = $reg1['id_empresa'];
	}

	$con2 = "SELECT * FROM tb_ticket WHERE id_ticket=?";
	$stmt=$link->prepare($con2);
	$stmt->bind_param('s',$idTicket);
	$stmt->execute();
	$res2=$stmt->get_result();

	if ($res2->num_rows == 0) {	
	
		echo "<script type='text/javascript'>alert('Ticket não encontrado!!!');window.location=('consultarTicket.php');</script>";
	}

	while($reg2 = $res2->fetch_array()){
		$idEmpresaTicket = $reg2['id_empresa'];
	}

	if($idEmpresa != $idEmpresaTicket){

		echo "<script type='text/javascript'>alert('Este Ticket não pertence a sua empresa!!!');window.location=('consultarTicket.php');</script>";

	}
}else 

	$con2 = "SELECT * FROM tb_ticket WHERE id_ticket='$idTicket'";
	
	$res2 = $link->query($con2);

if ($res2->num_rows == 0) {	
		
		echo "<script type='text/javascript'>alert('Ticket não encontrado!!!');window.location=('consultarTicket.php');</script>";
	
	}
	
else{ ?>
		
<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<meta charset="utf-8">
		<title>Colsultar Ticket</title>
		<link href="css/estilos.css" rel="stylesheet" />
		<script type="text/javascript" src="js/javascript.js"></script>
		<!--[if lt IE 11]> <meta http-equiv="X-UA-Compatible" content="IE=8"/> <![endif]-->
	</head>

<body>
	
	<div id="conteudoArea">

			<div id="conteudo">

					<h1>Consulta</h1>	
	
						<table>
								<tr>
									<th>N° do Ticket</th>
									<th>Equipamento</th>
									<th>Cód. Equipamento</th>
									<th>Solicitante</th>
									<th>setor</th>
									<th>data de abertura</th>
									<th>hora de abertura</th>
									<th>Situação</th>
									<th>data de encerramento</th>
									<th>Hora de encerramento</th>
									<th>Opções</th>								
								</tr>	
	

<?php
	while($reg3 = $res2->fetch_array()){

		if($reg3['te_situacao'] == 'Em Aberto'){
			$cor = 'bgcolor="#FF6347"';
		}  if($reg3['te_situacao'] == 'Encerrada'){
			$cor = 'bgcolor="#98FB98"';
		}
	
		echo	"<tr>
				<td>".$reg3['id_ticket']."</td>
				<td>".$reg3['nm_equipamento']."</td>
				<td>".$reg3['nu_codEquipamento']."</td>
				<td>".$reg3['nm_solicitante']."</td>
				<td>".$reg3['nm_setor']."</td>
				<td>".$reg3['dt_dataAberto']."</td>
				<td>".$reg3['hr_horaAberto']."</td>
				<td ".$cor.">".$reg3['te_situacao']."</td>
				<td>".$reg3['dt_dataFechado']."</td>
				<td>".$reg3['hr_horaFechado']."</td>
				<td><a href='visualisarTicket.php?idTicket=".$reg3['id_ticket']."' target='_blank' ><button type='button' class='buttonAll'>Visualizar</button></a></td>";
		
	}
	}	
$link->close();
?>

						</table><br />
							<a href="consultarTicket.php"><button type="button" class="buttonAll">Voltar</button></a><br /><br />

			</div>
	</div>
<?php include "menu.php" ?>
</body>
</html>

