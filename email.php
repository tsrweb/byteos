<?php
$para = "suporte@byteos.com.br";
$assunto = "Teste de envio de email";
$menssagem = "Isto é um teste de envio de email através do PHP";
$cabecalho = "MIME-Version: 1.0" . "\r\n";
$cabecalho .= "Content-type: text/html; charset=ISO 8859-1" . "\r\n";
$cabecalho .= "from: nome_remetente<remetente@remetente.pt>" . "\r\n" . "Reply-to: remetente@remetente.pt" . "\r\n";
mail($para, $assunto, $menssagem, $cabecalho);
echo "Email enviado com sucesso.";
?>