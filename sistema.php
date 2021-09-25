<?php	/* Desenvolvido por Tiago Rodrigues */
	session_start();

	if((!isset($_SESSION['nome']))){
		header('location: index.php');
	}

	$logado = $_SESSION['nome'];	
	
	if($logado != "Byte OS"){
		echo "<style>#adm{display: none;}</style>";
	}

?>

<?php
	
	include "conecta.php";

	if($logado != "Byte OS"){

	$con0 = "SELECT * FROM tb_empresa WHERE nm_empresa = '$logado'";
	$res0 = $link->query($con0);

	while($reg0 = $res0->fetch_array()){
		$idEmpresa = $reg0['id_empresa'];
	};

	$con1 = "SELECT * FROM tb_ticket WHERE te_situacao = 'Em Aberto' AND id_empresa = '$idEmpresa'";
	$res1 = $link->query($con1);
	$reg1 = $res1->num_rows;

	$con2 = "SELECT * FROM tb_ticket WHERE te_situacao = 'Encerrada' AND id_empresa = '$idEmpresa'";
	$res2 = $link->query($con2);
	$reg2 = $res2->num_rows;

}else{

	$con1 = "SELECT * FROM tb_ticket WHERE te_situacao = 'Em Aberto'";
	$res1 = $link->query($con1);
	$reg1 = $res1->num_rows;

	$con2 = "SELECT * FROM tb_ticket WHERE te_situacao = 'Encerrada'";
	$res2 = $link->query($con2);
	$reg2 = $res2->num_rows;

}

$soma = $reg1 + $reg2;

?>



<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<title>Sistema</title>
		<link href="css/estilos.css" rel="stylesheet" />
		<script type="text/javascript" src="js/javascript.js"></script>
		<script type="text/javascript" src="jquery/jquery-1.11.3.js"></script>
		<!--[if lt IE 11]> <meta http-equiv="X-UA-Compatible" content="IE=8"/> <![endif]-->
	</head>
	
<body>

	<div id="conteudoArea">

		<div id="conteudo">

			<h2>Bem Vindo <i><?php echo "$logado";?></i>!</h2>

			<p>Essa é a sua página inicial, você pode votar aqui clicando no nosso logo localizado em cima do menu e terá a informação de quantos tickets estão abertos e encerrados logo abaixo.</p>

			<ul>
				<li>MENU</li>
				<ul>
					<li>NOVO TICKET</li>
					Nesta opção, você irá abrir um novo ticket, fornecendo as informações sobre o equipamento defeituoso ou a solicitação que deseja. Após o envio será enviado um e-mail para o responsável pelo contrato contendo todas as informações preenchidas no ticket.
					<li>CONSULTAR TICKET</li>
					Aqui você pode verificar o status do ticket através de sua ID que é gerada automaticamente pelo sistema na hora do cadastro e enviada por e-mail para o responsável pelo contrato.
					<li>HISTÓRICO DE TICKETS</li>
					Nesta opção você encontra uma lista com todos os seus tickets, podendo checar seu status e visualizar o processo de cada um separadamente.
					<li>SAIR DO SISTEMA</li>
					Encerra sua sessão, fazendo logoff no sistema.
				</ul>
			</ul>

			<table id="infoTickets">
				<tr>
					<th colspan="2">Total de Tickets = <?php echo"$soma"?></th>
						</tr>
							<tr>
								<td bgcolor="#FF6347">Em Aberto</td>
									<td><?php echo"$reg1"?></td>
										</tr>
											<tr>
												<td bgcolor="#98FB98">Encerrado</td>									
													<td><?php echo"$reg2"?></td>
														</tr>
			</table>

		</div>
	</div>

<?php include "menu.php" ?>
	</body>
</html>