<?php

	session_start();

	if((!isset($_SESSION['nome']))){
		header('location: index.php');
	}

	$logado = $_SESSION['nome'];	

$idTicket = $_GET['idTicket'];

include "conecta.php";
	
	$con = "SELECT * FROM tb_ticket WHERE id_ticket = ?";
	$stmt=$link->prepare($con);
	$stmt->bind_param('s',$idTicket);
	$stmt->execute();
	$res=$stmt->get_result();
	
		while($reg = $res->fetch_array()){
	
			$id = $reg['id_ticket'];
			$equipamento = $reg['nm_equipamento'];
			$marcaModelo = $reg['te_marcaModelo'];
			$codEquip = $reg['nu_codEquipamento'];
			$solicitante = $reg['nm_solicitante'];
			$setor = $reg['nm_setor'];
			$fnSolicitante = $reg['fn_solicitante'];
			$defeito = $reg['te_defeitoRelatado'];
			$solucao = $reg['te_servicoRealizado'];
			$tecnico = $reg['nm_tecnico'];
			$dataAberto = $reg['dt_dataAberto'];
			$horaAberto = $reg['hr_horaAberto'];
			$situacao = $reg['te_situacao'];
			$dataFechado = $reg['dt_dataFechado'];
			$horaFechado = $reg['hr_horaFechado'];
			$idEmpresa = $reg['id_empresa'];
				
}

	$con1 = "SELECT * FROM tb_empresa WHERE id_empresa = '$idEmpresa'";

	$res2 = $link->query($con1);

		while($reg2 = $res2->fetch_array()){

			$nomeEmpresa = $reg2['nm_empresa'];
			$contato = $reg2['nm_contato'];
		}

$link->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<meta charset="utf-8">

<head>
	<title>Cadastro de Chamado</title>
	<link href="css/estilosVisualizar.css" rel="stylesheet" />
	<script type="text/javascript" src="js/javascript.js"></script>
</head>

<body>	

<header>
	<img src="img/banner.png" hrel="banner"/>
</header>

		<div id="ticket">
				Ticket de N°  <?php echo $id;?>
		</div>

			<div id="dadosEmpresa">

				<label for="empresa">Empresa:</label> <?php echo $nomeEmpresa;?><br />
				<label for="contato">Contato:</label> <?php echo $contato;?><br />
				<label for="solicitante">Solicitante:</label> <?php echo $solicitante;?>
				<label for="setor">Setor:</label> <?php echo $setor;?><br />
				<label for="telefone">Telefone:</label> <?php echo $fnSolicitante;?><br />

			</div>

				<div id="dadosEquipamento">

					<label for="equipamentos">Equipamento:</label> <?php echo $equipamento;?><br />
					<label for="marcaModelo">Marca / Modelo:</label> <?php echo $marcaModelo;?><br />
					<label for="codEquip">Código / Serial:</label> <?php echo $codEquip;?><br />

				</div>

					<div id="relatos">
						<div class="textoRelatos">
							<label for="defeitoErlatado">Defeito Relatado:</label> <?php echo $defeito;?>
								</div>
					</div>

						<div id="relatos">
							<div class="textoRelatos">
								<label for="ServicoRealizado">Serviço Realizado:</label> <?php echo $solucao;?><br />
									</div>										
										<label for="tecnico">Técnico Responsável:</label> <?php echo $tecnico;?>
												
						</div>

							<div id="status">

								<label for="dataAberto">Data de Abertura:</label> <?php echo $dataAberto."  <label for='horaAberto'>Hora:</label>".$horaAberto;?> <br />
								<label for="dataFechado">Data de Encerramento:</label> <?php echo $dataFechado."  <label for='horaFechado'>Hora:</label>".$horaFechado;?> <br />
								<label for="status">Status:</label> <?php echo $situacao;?>

							</div>


		<footer id="rodape"><a href="http://www.byteos.com.br/suporte" target="_blank">www.byteos.com.br/suporte</a></footer>

</body>
</html>