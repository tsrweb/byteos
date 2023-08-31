<?php	/* Desenvolvido por Tiago Rodrigues */
	session_start();	
	
	$logado = $_SESSION['nome'];
	
	if($logado != "Byte OS"){
		header('location: index.php');
	}

$idEmpresa = $_GET['idEmpresa'];

include "conecta.php";

	$con = "SELECT * FROM tb_empresa WHERE id_empresa = '$idEmpresa' ";
	$res = $link->query($con);

	while($reg = $res->fetch_array()){

		$empresa = $reg['nm_empresa'];
		$cnpj = $reg['nu_cnpj'];
		$logradouro = $reg['te_logradouro'];
		$logNumero = $reg['nu_logNumero'];
		$bairro = $reg['nm_bairro'];
		$cidade = $reg['nm_cidade'];
		$uf = $reg['sl_uf'];
		$cep = $reg['nu_cep'];
		$telefone = $reg['fn_empresa'];
		$email = $reg['te_email'];
		$contato = $reg['nm_contato'];
		$usuario = $reg['nm_usuario'];
		$senha = $reg['pw_senha'];
	};

$link->close();
?>

<!DOCTYPE html>
<html lang="pt-br" >
	<head>
		<meta charset="utf-8">
		<title>Visualizar Empresa</title>
		<link href="css/estilos.css" rel="stylesheet" />
		<script type="text/javascript" src="js/javascript.js"></script>
		<script type="text/javascript" src="jquery/jquery-1.11.3.js"></script>
		<!--[if lt IE 11]> <meta http-equiv="X-UA-Compatible" content="IE=8"/> <![endif]-->
	</head>

		<div id="conteudoArea">

				<div id="conteudo">
						
					<h1>Visualiar Empresa</h1>

						<form method="post" action="atualizarEmpresa.php" >
							
							<label for="idEmpresa">ID da Empresa</label>
							<input type="text" id="idEmpresa" class="inputAll" name="idEmpresa" value="<?php echo "$idEmpresa";?>" readonly size="2"/><br /><br />

							<label for="empresa">Nome da Empresa:</label>
							<input type="text" name="empresa" class="inputAll" size="50" value="<?php echo "$empresa";?>" readonly/><br /><br />
							<label for="cnpj">CNPJ:</label>
							<input type="text" name="cnpj" class="inputAll" id="cnpj" value="<?php echo "$cnpj";?>" readonly/><br /><br />

									<div class="campoLateral">
										<label for="logradouro">Logradouro:</label>	
										<input type="text" name="logradouro" class="inputAll" size="50" value="<?php echo "$logradouro";?>" readonly/><br />
									</div>

							<label for="logNumero">Número:</label>						
							<input type="text" name="logNumero" id="logNumero" class="inputAll" size="5" value="<?php echo "$logNumero";?>" readonly/><br /><br />
									
									<div class="campoLateral">
										<label for="bairro">Bairro:</label>
										<input type="text" name="bairro" class="inputAll" value="<?php echo "$bairro";?>" readonly/>	<br />
									</div>

									<div class="campoLateral">
										<label for="cidade">Cidade:</label>				
										<input type="text" name="cidade" class="inputAll" value="<?php echo "$cidade";?>" readonly/><br />
									</div>

									<div class="campoLateral">
										<label for="uf">UF:</label>
										<input type="text" name="uf" id="uf" class="inputAll" size="1" maxlength="2" value="<?php echo "$uf";?>" readonly/><br />				
									</div>

							<label for="cep">CEP:</label>						
							<input type="text" name="cep" id="cep" class="inputAll" size="5" value="<?php echo "$cep";?>" readonly/><br /><br />

							<label for="telefone">Telefone:</label>
							<input type="text" name="telefone" id="tel" value="<?php echo "$telefone";?>" class="inputAll" size="10" readonly/><br /><br />
							<label for="email">E-Mail:</label>
							<input type="text" name="email" class="inputAll" size="50" value="<?php echo "$email";?>" readonly/><br /><br />
							<label for="contato">Contato:</label>
							<input type="text" name="contato" class="inputAll" value="<?php echo "$contato";?>" readonly/><br /><br />

									<div class="campoLateral">
							<label for="usuario">Usuário:</label>
							<input type="text" name="usuario" class="inputAll" value="<?php echo "$usuario";?>" readonly/><br />
									</div>

							<label for="senha">Senha:</label>
							<input type="password" name="senha" class="inputAll" value="<?php echo "$senha";?>" readonly/> <br /><br />

							<a href="consultarEmpresa.php"><button type="button" class="buttonAll">Voltar</button></a>

						</form>						
				</div>
		</div>
	<?php include "menu.php" ?>
</body>
</html>