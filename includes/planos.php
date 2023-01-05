<?php // Seção planos da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }

//$str_sql_planos = "SELECT * FROM planos WHERE ID_PAGINA='$id_pagina_atual';";
$str_sql_planos = "SELECT * FROM planos;";
$sql_planos = mysqli_query($conexao,$str_sql_planos);

if (mysqli_num_rows($sql_planos) > 0) {

?>
	<div class="container-fluid bg-light">
		<h1 class="h1 text-center"<?php echo $titulo_responsivo; ?>>Conheça nossos <strong>PLANOS</strong></h1>
	</div>
	<section id="portfolio" style="padding: 0px;">
		<div class="container-fluid">
			<div class="row">
<?php

	mysqli_data_seek($sql_planos,0);

	while ($linha_planos = mysqli_fetch_assoc($sql_planos)) {
		$id_plano = $linha_planos['ID'];
		$titulo_plano = $linha_planos['TITULO'];
		$link_titulo_plano = $linha_planos['LINK_TITULO'];
		$subtitulo_plano = $linha_planos['SUBTITULO'];
		$link_subtitulo_plano = $linha_planos['LINK_SUBTITULO'];
		$local_img_mini_plano = $linha_planos['LOCAL_IMG_MINI'];
		$local_img_maior_plano = $linha_planos['LOCAL_IMG_MAIOR'];

?>
				<div class="col-lg portfolio-item">
					<a class="portfolio-link text-center" href="plano.php?id_plano=<?php echo $id_plano; ?>">
						<div class="portfolio-hover bg-transparent">
							<div class="portfolio-hover-content"><i class="fa fa-plus fa-3x"></i></div>
						</div>
						<img class="img-fluid" src="<?php echo $local_img_mini_plano; ?>">
					</a>
					<div class="portfolio-caption">
						<h4><?php echo $titulo_plano; ?></h4>
						<p class="text-muted"><?php echo $subtitulo_plano; ?></p>
						<a class="btn btn-secondary btn-sm text-uppercase js-scroll-trigger" role="button" href="https://api.whatsapp.com/send?phone=554331780900&text=Olá!%20Quero%20o%20<?php echo str_replace(" ", "%20", $titulo_plano) ; ?>." target="_blank">CONTRATAR</a>
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

@mysqli_free_result($sql_planos);

?>