<?php // Seção de inicialização de script da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }

@ob_start();
$msg = "";

$pesquisa_txt = '';
if (isset($_GET['pesquisa_txt'])) {
	$pesquisa_txt = htmlspecialchars_decode($_GET['pesquisa_txt']);
}

$protocolo = 'http';
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
	$protocolo = $_SERVER['HTTP_X_FORWARDED_PROTO'];
} elseif (isset($_SERVER['HTTPS'])) {
	if ($_SERVER['HTTPS'] == 'on') {
		$protocolo = 'https';
	}
}
$host_atual = $_SERVER['SERVER_NAME'];

if ($host_atual != 'localhost' && $protocolo == 'http') {
	header('Location: ' . str_replace('http','https',$_SERVER['SCRIPT_URI']));
}

$hash_aleatorio = md5(rand());
@$_GET['h'] = $hash_aleatorio;

$phpselfpg = $_SERVER["PHP_SELF"];

$matriz_phpself = explode('/', $phpselfpg);

$pg_atual = $matriz_phpself[count($matriz_phpself)-1];
$nome_pagina_atual = explode('.', $pg_atual);

$dominio_atual = $matriz_phpself[0];

$titulo_responsivo = ' style="font-size: 5vw;"';
?>