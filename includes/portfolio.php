<?php // Seção portfolios da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }

//$str_sql_titulo_portfolio = "SELECT * FROM titulos_portfolios WHERE ID_PAGINA='$id_pagina_atual';";
$str_sql_titulo_portfolio = "SELECT * FROM titulos_portfolios;";
$sql_titulo_portfolio = mysqli_query($conexao,$str_sql_titulo_portfolio);

if (mysqli_num_rows($sql_titulo_portfolio) > 0) {

?>
	<section id="portfolio" style="padding: 0px;">
		<div class="container-fluid">
<?php

	mysqli_data_seek($sql_titulo_portfolio,0);

	$linha_titulo_portfolio = mysqli_fetch_assoc($sql_titulo_portfolio);
	$id_titulo_portfolio = $linha_titulo_portfolio['ID'];
	$titulo_portfolio_principal = $linha_titulo_portfolio['TITULO'];
	$subtitulo_portfolio_principal = $linha_titulo_portfolio['SUBTITULO'];

?>
			<div class="row bg-light">
				<div class="col-lg text-center">
					<h2 class="text-uppercase section-heading"><?php echo $titulo_portfolio_principal; ?></h2>
					<h3 class="section-subheading text-muted"><?php echo $subtitulo_portfolio_principal; ?></h3>
				</div>
			</div>
			<div class="row">
<?php

	$str_sql_portfolios = "SELECT * FROM portfolios WHERE ID_TITULOS_PORTFOLIOS='$id_titulo_portfolio';";
	$sql_portfolios = mysqli_query($conexao,$str_sql_portfolios);

	if (mysqli_num_rows($sql_portfolios) > 0) {
		mysqli_data_seek($sql_portfolios,0);
		while ($linha_portfolios = mysqli_fetch_assoc($sql_portfolios)) {
			$id_portfolio = $linha_portfolios['ID'];
			$img_mini_portfolio = $linha_portfolios['LOCAL_IMG_MINI'];
			$titulo_portfolio = $linha_portfolios['TITULO'];
			$breve_descricao_portfolio = $linha_portfolios['BREVE_DESCRICAO'];

?>
				<div class="col-sm-6 col-md-4 portfolio-item">
					<a class="portfolio-link" data-toggle="modal" href="#portfolioModal<?php echo $id_portfolio; ?>">
						<div class="portfolio-hover bg-transparent">
							<div class="portfolio-hover-content"><i class="fa fa-plus fa-3x"></i></div>
						</div>
						<img class="img-fluid" src="<?php echo $img_mini_portfolio; ?>">
					</a>
					<div class="portfolio-caption">
						<h4><?php echo $titulo_portfolio; ?></h4>
						<p class="text-muted"><?php echo $breve_descricao_portfolio; ?></p>
					</div>
				</div>
<?php
			
		}

?>
			</div>
<?php

	}

?>
		</div>
	</section>
<?php

}

@mysqli_free_result($sql_titulo_portfolio);
@mysqli_free_result($sql_portfolios);

// Seção portfolios (modal) - nossas unidades

//$str_sql_titulo_portfolio = "SELECT * FROM titulos_portfolios WHERE ID_PAGINA='$id_pagina_atual';";
$str_sql_titulo_portfolio = "SELECT * FROM titulos_portfolios;";
$sql_titulo_portfolio = mysqli_query($conexao,$str_sql_titulo_portfolio);

if (mysqli_num_rows($sql_titulo_portfolio) > 0) {
	mysqli_data_seek($sql_titulo_portfolio,0);

	$linha_titulo_portfolio = mysqli_fetch_assoc($sql_titulo_portfolio);
	$id_titulo_portfolio = $linha_titulo_portfolio['ID'];
	$titulo_portfolio_principal = $linha_titulo_portfolio['TITULO'];
	$subtitulo_portfolio_principal = $linha_titulo_portfolio['SUBTITULO'];

	$str_sql_portfolios = "SELECT * FROM portfolios WHERE ID_TITULOS_PORTFOLIOS='$id_titulo_portfolio';";
	$sql_portfolios = mysqli_query($conexao,$str_sql_portfolios);

	if (mysqli_num_rows($sql_portfolios) > 0) {
		mysqli_data_seek($sql_portfolios,0);
		while ($linha_portfolios = mysqli_fetch_assoc($sql_portfolios)) {
			$id_portfolio = $linha_portfolios['ID'];
			$img_maior_portfolio = $linha_portfolios['LOCAL_IMG_MAIOR'];
			$titulo_portfolio = $linha_portfolios['TITULO'];
			$breve_descricao_portfolio = $linha_portfolios['BREVE_DESCRICAO'];
			$descricao_portfolio = $linha_portfolios['DESCRICAO'];
			$desde_portfolio = $linha_portfolios['DESDE'];
			$icone_desde_portfolio = $linha_portfolios['ICONE_DESDE'];
			$icone_endereco_portfolio = $linha_portfolios['ICONE_ENDERECO'];
			$logradouro_portfolio = $linha_portfolios['LOGRADOURO'];
			$numero_logradouro_portfolio = $linha_portfolios['NUMERO_LOGRADOURO'];
			$cidade_portfolio = $linha_portfolios['CIDADE'];
			$uf_portfolio = $linha_portfolios['UF'];
			$cep_portfolio = $linha_portfolios['CEP'];
			$ddd_fone_portfolio = $linha_portfolios['DDD_FONE'];
			$fone_portfolio = $linha_portfolios['FONE'];
			$icone_fone_portfolio = $linha_portfolios['ICONE_FONE'];
			$ddd_whatsapp_portfolio = $linha_portfolios['DDD_FONE_WHATSAPP'];
			$whatsapp_portfolio = $linha_portfolios['FONE_WHATSAPP'];
			$icone_whatspp_portfolio = $linha_portfolios['ICONE_WHATSAPP'];
			$mapa_google_portfolio = $linha_portfolios['MAPA_GOOGLE'];

?>
	<!-- Janela modal da seção de portfolio (nossas_unidades.php) -->
	<div class="modal fade portfolio-modal text-center" role="dialog" tabindex="-1" id="portfolioModal<?php echo $id_portfolio; ?>">
		<div class="container-fluid w-100 text-right"><button class="btn btn-primary" data-dismiss="modal" type="button" title="Fechar"><i class="fa fa-window-close"></i></button></div>
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="container">
						<div class="row">
							<div class="col-lg-8 mx-auto">
								<div class="modal-body">
									<h2 class="text-uppercase"<?php echo $titulo_responsivo; ?>><?php echo $titulo_portfolio; ?></h2>
									<h4><?php echo $breve_descricao_portfolio; ?></h4>
									<p class="item-intro text-muted"><?php echo $descricao_portfolio; ?></p>
									<img class="img-fluid d-block mx-auto" src="<?php echo $img_maior_portfolio; ?>">
									<p><i class="fa fa-<?php echo $icone_desde_portfolio; ?>"></i> Desde <?php echo $desde_portfolio; ?></p>
									<ul class="list-unstyled">
										<li><i class="fa fa-<?php echo $icone_endereco_portfolio; ?>"></i> <?php echo $logradouro_portfolio; ?>, <?php echo $numero_logradouro_portfolio; ?></li>
										<li><?php echo $cidade_portfolio; ?>/<?php echo $uf_portfolio; ?></li>
										<li>CEP <?php echo $cep_portfolio; ?></li>
										<li><a href="tel:+55<?php echo $ddd_fone_portfolio; ?><?php echo $fone_portfolio; ?>"><i class="fa fa-<?php echo $icone_fone_portfolio; ?>"></i></a> <a href="https://api.whatsapp.com/send?phone=55<?php echo $ddd_whatsapp_portfolio; ?><?php echo $whatsapp_portfolio; ?>&text=Olá!%20Quero%20conhecer%20a%20Unidade%20de%20Ibiporã."><i class="fa fa-<?php echo $icone_whatsapp_portfolio; ?>"></i></a> (<?php echo $ddd_fone_portfolio; ?>) <?php echo $fone_portfolio; ?></li>
									</ul>
									<footer class="blockquote-footer">SAF Bom Pastor <cite title="Respeito e Dignidade em todos os momentos da vida!">Respeito e Dignidade em todos os momentos da vida!</cite></footer>
									<button class="btn btn-primary" data-dismiss="modal" type="button"><i class="fa fa-times"></i><span> Fechar</span></button></div>
									<div class="container-fluid" style="padding: 0px;">
										<?php echo $mapa_google_portfolio; ?> 
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
		}
	}
}

?>
?>
