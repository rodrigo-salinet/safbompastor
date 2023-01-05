<?php // Seção pesquisar da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }

$texto_pesquisa = '';
if (isset($_GET['search'])) {
	$texto_pesquisa = $_GET['search'];
} else {
	header('Location: index.php?msg=' . htmlspecialchars("Ops! Não encontramos nada. Por favor, tente digitar outra palavra e pesquisar novamente. Obrigado!"));
}

$str_sql_textos_pesquisados = "INSERT INTO `textos_pesquisados` (
	`ID`,
	`TEXTO`
	) VALUES (
	NULL, 
	'$texto_pesquisa'
	);";
if (!mysqli_query($conexao,$str_sql_textos_pesquisados)) {
	$msg .= " | Ops! Algo de errado não está certo e não foi possível registrar a pesquisa. Por favor, verifique e tente novamente. Obrigado. | ";
}

$str_sql_tabelas_pesquisa = "SELECT * FROM tabelas_pesquisa;";
$sql_tabelas_pesquisa = mysqli_query($conexao,$str_sql_tabelas_pesquisa);

// se encontrar "_" (separador), desmembrar palavras nos campos
	
// nomes dos campos que não serão pesquisados:
$campos_ignorados = array(
	'ID',
	'DIA',
	'MES',
	'ANO',
	'LINK',
	'URL',
	'HTML',
	'HORA',
	'MINUTO',
	'SEGUNDO',
	'ICONE',
	'IMG',
	'VIDEO',
	'GOOGLE'
);

if (@mysqli_num_rows($sql_tabelas_pesquisa) > 0 && $texto_pesquisa != '') {
	$resultados = array();
	$i = 0;
	while ($linha_tabelas_pesquisa = mysqli_fetch_assoc($sql_tabelas_pesquisa)) {
		$tabela_pesquisa = $linha_tabelas_pesquisa['TABELA'];
		
		$str_sql_campos_tabela = "SHOW COLUMNS FROM $tabela_pesquisa;";
		$sql_campos_tabela = mysqli_query($conexao,$str_sql_campos_tabela);

		while ($linha_tabela = mysqli_fetch_assoc($sql_campos_tabela)) {
			$nome_campo = $linha_tabela['Field'];
			$encontrou_campo = "N";
			foreach($campos_ignorados as $campo_nome) {
				$campo_dividido = explode("_",$nome_campo);
				if (count($campo_dividido) > 1) {
					foreach ($campo_dividido as $parte_campo) {
						if ($parte_campo == $campo_nome) {
							$encontrou_campo = "S";
							break  1; // break 1: interrompe somente o foreach | break 2: interrompe o foreach e o while;
						}
					}
				} elseif ($campo_nome == $nome_campo) {
					$encontrou_campo = "S";
					break 1; // break 1: interrompe somente o foreach | break 2: interrompe o foreach e o while;
				}
				$ponteiro_campo_nome = stripos($campo_nome, $nome_campo);
				if (is_numeric($ponteiro_campo_nome)) {
					$encontrou_campo = "S";
					break 1; // break 1: interrompe somente o foreach | break 2: interrompe o foreach e o while;
				}
			}
			if ($encontrou_campo == "N") {
				$str_sql_busca_texto = "SELECT * FROM $tabela_pesquisa WHERE $nome_campo LIKE '%$texto_pesquisa%';";
				$sql_busca_texto = mysqli_query($conexao,$str_sql_busca_texto);

				if (@mysqli_num_rows($sql_busca_texto) > 0) {
					$linha_tabela_tmp = mysqli_fetch_assoc($sql_busca_texto);
					$id_tabela = $linha_tabela_tmp['ID'];
					$id_pagina = '0';
					if (isset($linha_tabela_tmp['ID_PAGINA'])) {
						$id_pagina = $linha_tabela_tmp['ID_PAGINA'];
					}
					/*
					$resultados[$i] = "
						0 tabela
						~
						1 campo
						~
						2 id
						~
						3 texto_encontrado
						~
						4 id_pagina" 
					*/
					$resultados[$i] = "$tabela_pesquisa~$nome_campo~$id_tabela~$texto_pesquisa~$id_pagina";
					$i++;
				}
				@mysqli_free_result($sql_busca_texto);
			}
		}
	}
}

if (count($resultados) > 0) {
	
?>
	<div class="container-fluid bg-light">
		<h1 class="h1 text-center">RESULTADOS da sua pesquisa:</h1>
	</div>
<?php

	foreach($resultados as $resultado) {
		$resultado_tmp = explode("~",$resultado);

		$tbl_tmp = $resultado_tmp[0];
		$campo_tmp = $resultado_tmp[1];
		$id_tmp = $resultado_tmp[2];
		$txt_tmp = $resultado_tmp[3];
		$id_pagina_tmp = $resultado_tmp[4];
		$pg_tmp = '';
		$get_var_tmp = "?pesquisa_txt=$txt_tmp";
		
		$str_sql_pagina = "SELECT * FROM paginas WHERE ID=$id_pagina_tmp;";
		$sql_pagina = mysqli_query($conexao,$str_sql_pagina);
		
		$titulo_tmp = '';
		$campo_resultado_tmp = '';
		if (@mysqli_num_rows($sql_pagina) > 0) {
			$linha_pagina_tmp = mysqli_fetch_assoc($sql_pagina);
			$pg_tmp = $linha_pagina_tmp['NOME'];
			$ext_tmp = $linha_pagina_tmp['EXTENSAO'];
			$titulo_tmp = $linha_pagina_tmp['TITULO'];
			
			$str_sql_resultado_tmp = "SELECT * FROM $tbl_tmp WHERE $campo_tmp LIKE '%$txt_tmp%';";
			$sql_resultado_tmp = mysqli_query($conexao,$str_sql_resultado_tmp);
			$linha_resultado_tmp = mysqli_fetch_assoc($sql_resultado_tmp);
			$campo_resultado_tmp = $linha_resultado_tmp[$campo_tmp];
			$ponteiro_txt_tmp = intval(stripos($campo_resultado_tmp,$txt_tmp));
			$inicio_txt_tmp = $ponteiro_txt_tmp;
			if ($ponteiro_txt_tmp > 5 && $ponteiro_txt_tmp < 10) {
				$inicio_txt_tmp = $ponteiro_txt_tmp - 5;
			} elseif ($ponteiro_txt_tmp > 10 && $ponteiro_txt_tmp < 15) {
				$inicio_txt_tmp = $ponteiro_txt_tmp - 10;
			} elseif ($ponteiro_txt_tmp > 15 && $ponteiro_txt_tmp < 20) {
				$inicio_txt_tmp = $ponteiro_txt_tmp - 15;
			} elseif ($ponteiro_txt_tmp > 20) {
				$inicio_txt_tmp = $ponteiro_txt_tmp - 20;
			}
			$txt_tamanho_txt_tmp = strlen($campo_resultado_tmp) - $ponteiro_txt_tmp;
			if ($txt_tamanho_txt_tmp > 50) {
				$txt_tamanho_txt_tmp = 50;
			}
			$campo_resultado_tmp = substr($campo_resultado_tmp,$inicio_txt_tmp,$txt_tamanho_txt_tmp);
			$campo_resultado_tmp = str_ireplace($txt_tmp, "<strong>$txt_tmp</strong>",$campo_resultado_tmp);
			if (isset($linha_resultado_tmp['GET_VAR'])) {
				$get_var_tmp .= "&" . $linha_resultado_tmp['GET_VAR'] . "=$id_tmp";
			}
			
			@mysqli_free_result($sql_resultado_tmp);
		}
		@mysqli_free_result($sql_pagina);
?>
	<div class="container-fluid">
		<h3 class="h3 text-center">
			<p>Encontrou "<strong><?php echo $txt_tmp; ?></strong>", na página "<strong onmouseup="window.alert('<?php echo $campo_tmp; ?>');" title="<?php echo $campo_tmp; ?>"><?php echo $titulo_tmp; ?></strong>", no texto <span class="text-muted font-italic">"...<?php echo $campo_resultado_tmp; ?>..."</span></p>
			<p class="bg-info">
				<a class="link text-dark" href="<?php echo $pg_tmp; ?>.<?php echo $ext_tmp . $get_var_tmp; ?>">Clique aqui para acessar o conteúdo completo na <strong> Página < <?php echo $titulo_tmp; ?> ></strong></a>
			</p>
		</h3>
	</div>
<?php
		
	}
} else {
	header('Location: index.php?msg=' . htmlspecialchars("Ops! Não encontramos nada. Por favor, tente digitar outra palavra e pesquisar novamente. Obrigado!"));
}

?>