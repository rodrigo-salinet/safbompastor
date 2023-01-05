<?php // Seção de finalização de script da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }

//Encerradores de consulta

// apoiadores.php
@mysqli_free_result($sql_logos_apoiadores);

// banner.php
@mysqli_free_result($sql_banners);

// biografia.php
@mysqli_free_result($sql_biografia);

// biografias.php
@mysqli_free_result($sql_titulo_biografia);
@mysqli_free_result($sql_biografias);

// cabecalho.php
@mysqli_free_result($sql_dados_site);
@mysqli_free_result($sql_paginas);
@mysqli_free_result($sql_meta_tags);
@mysqli_free_result($sql_tipo_meta_tags);
@mysqli_free_result($sql_tipo_meta_tags);

// campanha_alimentos.php
@mysqli_free_result($sql_cidades_campanha_alimentos);
@mysqli_free_result($sql_campanha_alimentos);

// conecta.php
@mysqli_free_result($sql_pagina);

// depoimento_novo.php
@mysqli_free_result($sql_depoimento_novo);

// depoimento.php
@mysqli_free_result($sql_depoimento);

// depoimentos.php
@mysqli_free_result($sql_depoimentos);

// escolha_planos.php
@mysqli_free_result($sql_planos);
@mysqli_free_result($sql_planos_secoes);

// frota_moderna.php
@mysqli_free_result($sql_frota_moderna);

// log_.
@mysqli_free_result($sql_ver_log_);

// navbars.php
@mysqli_free_result($sql_navbars);

// pesquisar.php
@mysqli_free_result($sql_tabelas_pesquisa);
@mysqli_free_result($sql_campos_tabela);
@mysqli_free_result($sql_busca_texto);
@mysqli_free_result($sql_pagina);
@mysqli_free_result($sql_resultado_tmp);

// plano.php
@mysqli_free_result($sql_plano);
@mysqli_free_result($sql_planos_secoes);
@mysqli_free_result($sql_planos_itens);

// planos.php
@mysqli_free_result($sql_planos);

// portfolio.php
@mysqli_free_result($sql_titulo_portfolio);
@mysqli_free_result($sql_portfolios);

// rodape.php
@mysqli_free_result($sql_titulo_portfolio);
@mysqli_free_result($sql_portfolios);

// servicos.php
@mysqli_free_result($sql_titulo_servico);
@mysqli_free_result($sql_servicos);

// sobre.php
@mysqli_free_result($sql_titulo_sobre);
@mysqli_free_result($sql_sobre);

// texto.php
@mysqli_free_result($sql_texto);

@mysqli_close($conexao);
while(@ob_end_flush());

?>