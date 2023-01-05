<?php // Seção de conexão com banco de dados
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }

$txt_usuario = trim(@$_POST['txt_usuario']);
$txt_senha = md5(trim(@$_POST['txt_senha']));

@session_start();
$_SESSION['usuario'] = NULL;
$_SESSION['senha'] = NULL;
if ($txt_usuario && $txt_senha != '') {
	$_SESSION['usuario'] = $txt_usuario;
	$_SESSION['senha'] = $txt_senha;
}

$host = $host_atual;

$db = 'safbompastor';
$usuario = 'safbompastor';
$senha = 'zjbKdNhdTpKyumfp';

if ($host_atual != 'localhost') {

	/*
		base de dados antiga UOLHOST
	*/
	//$host = 'safbompastor.mysql.uhserver.com';
	//$db = 'safbompastor';
	//$usuario = 'usafbompastor';
	//$senha = 'S@f08007072030';

	$host = 'localhost';
	$db = 'safbom69_safbompastor';
	$usuario = 'safbom69_pastor';
	$senha = 'S@f08007072030';
}

$conexao = mysqli_connect($host,$usuario,$senha);
mysqli_set_charset($conexao,'utf8');
mysqli_select_db($conexao,$db);

$str_sql_pagina = "SELECT * FROM paginas WHERE NOME='$nome_pagina_atual[0]';";

$id_pagina_atual = '1';

if ($sql_pagina = mysqli_query($conexao,$str_sql_pagina)) {
	$linha_pagina = mysqli_fetch_assoc($sql_pagina);
	$id_pagina_atual = $linha_pagina['ID'];
	$em_manutencao_pagina_atual = $linha_pagina['EM_MANUTENCAO'];
}

?>