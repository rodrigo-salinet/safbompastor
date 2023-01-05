<?php // indexador do site

//phpinfo(); exit();

$index_ok = 'ok';
$titulo_pagina = '';

// Seção de inicialização de funções da página
require_once('includes/funcoes.php');

// Seção de inicialização de script da página
require_once('includes/script_inicio.php');

// Seção de conexão com o banco de dados
require_once('includes/conecta.php');

// Seção de log_ da página
require_once('includes/log_.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
<?php

// Seção Cabeçalho da página
require_once('includes/cabecalho.php');

// Seção CSS e estilos da página
require_once('includes/css.php');

// Seção google analyticts da página
require_once('includes/google.php');

// Seção javascript do cabeçalho da página
require_once('includes/javascript.php');

?>
	</head>
<?php

// Seção início do corpo da página
require_once('includes/body_inicio.php');

// Seção do elemento NavBar da página
require_once('includes/navbar.php');

if ($em_manutencao_pagina_atual != "S") {

	// Seção banner da página
	require_once('includes/banner.php');

	if ($pg_atual == 'index.php') {
		// Seção campanha alimentos da página
		//require_once('includes/campanha_alimentos.php');
	}
	
	if ($pg_atual == 'index.php') {
		// Seção planos da página
		require_once('includes/planos.php');
	}

	if ($pg_atual == 'index.php') {

		// Seção depoimento novo da página
		require_once('includes/depoimento_novo.php');

	}

	if ($pg_atual == 'assistencia_familiar.php') {

		// Seção textos das páginas
		require_once('includes/texto.php');

	}

	if (isset($chamar_pagina)) {
		if ($chamar_pagina != '') {
			require_once($chamar_pagina);
		}
	}

	// Seção sobre da página
	require_once('includes/sobre.php');

	if ($pg_atual == 'index.php') {

		// Seção biografias da página
		require_once('includes/biografias.php');

	}

	// Seção apoiadores da página
	require_once('includes/apoiadores.php');

} else {

	// Seção em desenvolvimento da página
	require_once('includes/em_desenvolvimento.php');

}

if ($pg_atual != 'trabalhe_conosco.php' && $pg_atual != 'assistencia_familiar.php') {

	// Seção formulário de contato da página
	require_once('includes/frm_contato.php');
	
}

// Seção mapa da página
require_once('includes/mapa.php');

?>
	<footer class="page-footer">
<?php

// Seção endereço da página
require_once('includes/endereco.php');

// Seção horário de atendimento da página
require_once('includes/atendimento.php');

// Seção mapa do site da página
require_once('includes/mapa_site.php');

?>
		<div class="container-fluid" style="padding-top: 10px;">
			<div class="row">
<?php

$tamanho_colunas = "col-xl";

// Seção copyright da página
require_once('includes/copyright.php');

// Seção política e termos da página
require_once('includes/politica_termos.php');

// Seção redes sociais da página
require_once('includes/redes_sociais.php');

?>
			</div>
		</div>
	</footer>
<?php

// Seção rodapé da página
require_once('includes/rodape.php');

// Seção fim do corpo da página
require_once('includes/body_fim.php');

// Seção de finalização de script da página
require_once('includes/script_fim.php');

?>