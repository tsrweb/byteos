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

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Consultar Ticket</title>
		<link href="css/estilos.css" rel="stylesheet" />
		<script type="text/javascript" src="js/javascript.js"></script>
		<!--[if lt IE 11]> <meta http-equiv="X-UA-Compatible" content="IE=8"/> <![endif]-->
	</head>

<body>

	<div id="conteudoArea">

			<div id="conteudo">

				<h1>Consultar Ticket</h1>

					<form method="post" action="exibirConsulta.php" >
					
					<label for="idTicket">Digite o ID do Ticket</label>
					<input type="text" name="idTicket" class="inputAll" required autocomplete="off" size="35"/><br /><br />
					
					<input type="submit" value="Procurar" class="buttonAll"/>
					<input type="reset" value="limpar" class="buttonAll"/>
					<a href="sistema.php"><button type="button" class="buttonAll">Voltar</button></a>

					</form>

			</div>
	</div>
	
<?php include "menu.php" ?>
</body>
</html>