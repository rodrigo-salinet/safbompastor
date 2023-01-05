<?php // Seção biografias da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }

$str_sql_titulo_biografia = "SELECT * FROM titulos_biografias WHERE ID_PAGINA='$id_pagina_atual';";
$sql_titulo_biografia = mysqli_query($conexao,$str_sql_titulo_biografia);

if (mysqli_num_rows($sql_titulo_biografia) > 0) {
	mysqli_data_seek($sql_titulo_biografia,0);

	$linha_titulo_biografia = mysqli_fetch_assoc($sql_titulo_biografia);
	$id_titulo_biografia = $linha_titulo_biografia['ID'];
	$titulo_biografia_principal = $linha_titulo_biografia['TITULO'];
	$subtitulo_biografia_principal = $linha_titulo_biografia['SUBTITULO'];

?>
	<div class="container-fluid bg-light">
		<h1 class="h1 text-center"<?php echo $titulo_responsivo; ?>><?php echo $titulo_biografia_principal; ?></h1>
	</div>
<?php

	$str_sql_biografias = "SELECT * FROM biografias WHERE ID_TITULOS_BIOGRAFIAS='$id_titulo_biografia';";
	$sql_biografias = mysqli_query($conexao,$str_sql_biografias);

	if (mysqli_num_rows($sql_biografias) > 0) {
		mysqli_data_seek($sql_biografias,0);

?>
	<section id="portfolio" style="padding: 10px;">
		<div class="container-fluid">
			<div class="row">
<?php
		while ($linha_biografias = mysqli_fetch_assoc($sql_biografias)) {
			$id_biografia = $linha_biografias['ID'];
			$nome_biografia = $linha_biografias['NOME'];
			$funcao_biografia = $linha_biografias['FUNCAO'];
			$descricao_biografia = $linha_biografias['DESCRICAO'];
			$local_img_principal_biografia = $linha_biografias['LOCAL_IMG_PRINCIPAL'];
			$texto_apresentacao_biografia = $linha_biografias['TEXTO_APRESENTACAO'];

?>
				<div class="col-sm-6 col-md-4 portfolio-item">
					<div class="team-member">
						<a class="portfolio-link" href="biografia.php?id_bio=<?php echo $id_biografia; ?>">
							<div class="portfolio-hover rounded-circle mx-auto bg-transparent">
								<div class="portfolio-hover-content"><i class="fa fa-plus fa-3x"></i></div>
							</div>
							<img class="rounded-circle mx-auto" src="<?php echo $local_img_principal_biografia; ?>">
						</a>
						<h4><?php echo $nome_biografia; ?></h4>
						<p class="text-muted"><?php echo $funcao_biografia; ?></p>
						<i><?php echo $descricao_biografia; ?></i>
					</div>
				</div>
<?php

		}

?>
		   </div>
		</div>
	</section>
<?php

	}
}

?>