<?php

	session_start();

	if((!isset($_SESSION['nome']))){
		header('location: index.php');
	}

	$logado = $_SESSION['nome'];	
	
	if($logado != "Byte OS"){
		header('location: index.php');
	}


include "conecta.php";

	$con = "SELECT * FROM tb_empresa ORDER BY id_empresa ASC";
	$res = $link->query($con);

 ?>
	
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Empresas Cadastradas</title>
		<link href="css/estilos.css" rel="stylesheet" />
		<script type="text/javascript" src="js/javascript.js"></script>
		<!--[if lt IE 11]> <meta http-equiv="X-UA-Compatible" content="IE=8"/> <![endif]-->
	</head>
	
		<div id="conteudoArea">

			<div id="conteudo">

					<h1>Empresas Cadastradas</h1>	
	
						<table>
							<tr>
								<th>ID</th>
								<th>Empresa</th>
								<th>CNPJ</th>
								<th>Contato</th>
								<th>Telefone</th>
								<th>Email</th>
								<th>Usuário</th>
								<th colspan="3">Opções</th>								
							</tr>
<?php

	while($reg = $res->fetch_array()){

		echo	"<tr>
				<td>".$reg['id_empresa']."</td>
				<td>".$reg['nm_empresa']."</td>
				<td>".$reg['nu_cnpj']."</td>
				<td>".$reg['nm_contato']."</td>
				<td>".$reg['fn_empresa']."</td>
				<td>".$reg['te_email']."</td>
				<td>".$reg['nm_usuario']."</td>
				<td><a href='visualizarEmpresa.php?idEmpresa=".$reg['id_empresa']."'><button type='button' class='buttonAll'>Visualizar</button></a></td>
				<td><a href='editarEmpresa.php?idEmpresa=".$reg['id_empresa']."'><button type='button' class='buttonAll'>Editar</button></a></td>
				<td><a href='historicoEmpresa.php?idEmpresa=".$reg['id_empresa']."'><button type='button' class='buttonAll'>Histórico</button></a></td></tr>";
		
};

$link->close();
?>
						</table><br /><br />
			</div>
		</div>
<?php include "menu.php" ?>
</body>
</html>