<?php // Seção Cabeçalho da página - entre as tags <head> e </head>
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }

$str_sql_dados_site = "SELECT * FROM dados_site WHERE ID=1;";

if ($sql_dados_site = mysqli_query($conexao,$str_sql_dados_site)) {
	$linha_dados_site = mysqli_fetch_assoc($sql_dados_site);
	$titulo_pagina = $linha_dados_site['TITULO_PRINCIPAL'];
} else {
	exit("Não foi possível executar a STRING SQL: $str_sql_dados_site - Erro: " . mysqli_error($conexao));
}

$str_sql_paginas = "SELECT * FROM paginas WHERE NOME='$nome_pagina_atual[0]';";

if ($sql_paginas = mysqli_query($conexao,$str_sql_paginas)) {
	$linha_paginas = mysqli_fetch_assoc($sql_paginas);
	$titulo_pagina = $linha_paginas['TITULO'] . " - " . $titulo_pagina;
} else {
	exit("Não foi possível executar a STRING SQL: $str_sql_paginas - Erro: " . mysqli_error($conexao));
}

?>
		<title><?php echo $titulo_pagina; ?></title>
		<meta property="og:title" content="<?php echo $titulo_pagina; ?>" />
<?php

$str_sql_meta_tags = "SELECT * FROM meta_tags;";

$txt_tipo_meta_tags = "name";

if ($sql_meta_tags = mysqli_query($conexao,$str_sql_meta_tags)) {
	while ($linha_meta_tags = mysqli_fetch_assoc($sql_meta_tags)) {
		$id_tipo_meta_tags = $linha_meta_tags['ID_TIPO_META_TAGS'];
		$txt_tipo_valor = $linha_meta_tags['TIPO_VALOR'];
		$txt_content_valor = $linha_meta_tags['CONTENT_VALOR'];

		$str_sql_tipo_meta_tags = "SELECT * FROM tipos_meta_tags WHERE ID=$id_tipo_meta_tags;";
		if ($sql_tipo_meta_tags = mysqli_query($conexao,$str_sql_tipo_meta_tags)) {
			$linha_tipo_meta_tags = mysqli_fetch_assoc($sql_tipo_meta_tags);
			$txt_tipo_meta_tags = $linha_tipo_meta_tags['TIPO'];
		}
		@mysqli_free_result($sql_tipo_meta_tags);

?>
		<meta <?php echo $txt_tipo_meta_tags; ?>="<?php echo $txt_tipo_valor;?>" content="<?php echo $txt_content_valor;?>" />
<?php

	}
	mysqli_data_seek($sql_meta_tags,0);
} else {
	exit("Não foi possível executar a STRING SQL: $str_sql_meta_tags - Erro: " . mysqli_error($conexao));
}

if ($host_atual == 'localhost') {
?>
		<!--meta http-equiv="refresh" content="10"-->
<?php
}

?>