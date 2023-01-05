<?php // Seção sobre da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }

$str_sql_titulo_sobre = "SELECT * FROM titulos_sobre WHERE ID_PAGINA='$id_pagina_atual';";
$sql_titulo_sobre = mysqli_query($conexao,$str_sql_titulo_sobre);

if (mysqli_num_rows($sql_titulo_sobre) > 0) {

?>
	<section id="about" style="padding: 20px;">
		<div class="container-fluid">
<?php

	mysqli_data_seek($sql_titulo_sobre,0);

	$linha_titulo_sobre = mysqli_fetch_assoc($sql_titulo_sobre);
	$id_titulo_sobre = $linha_titulo_sobre['ID'];
	$link_sobre_principal = $linha_titulo_sobre['LINK'];
	$titulo_sobre_principal = $linha_titulo_sobre['TITULO'];
	$subtitulo_sobre_principal = $linha_titulo_sobre['SUBTITULO'];

?>
			<div class="row-fluid bg-light">
				<div class="col-lg text-center">
					<h1 class="h1 text-center"<?php echo $titulo_responsivo; ?>><?php echo $titulo_sobre_principal; ?></h1>
				</div>
			</div>
<?php

	$str_sql_sobre = "SELECT * FROM sobre WHERE ID_TITULOS_SOBRE='$id_titulo_sobre';";
	$sql_sobre = mysqli_query($conexao,$str_sql_sobre);

	if (mysqli_num_rows($sql_sobre) > 0) {
		mysqli_data_seek($sql_sobre,0);

?>
			<div class="row">
				<div class="col-lg-12">
					<ul class="list-group timeline">
<?php

		$invertido = "";
		while ($linha_sobre = mysqli_fetch_assoc($sql_sobre)) {
			$id_sobre = $linha_sobre['ID'];
			$link_sobre = $linha_sobre['LINK'];
			$local_img_sobre = $linha_sobre['LOCAL_IMG'];
			$titulo_sobre = $linha_sobre['TITULO'];
			$subtitulo_sobre = $linha_sobre['SUBTITULO'];
			$breve_descricao_sobre = $linha_sobre['BREVE_DESCRICAO'];

?>
						<li class="list-group-item<?php echo $invertido; ?>">
							<div class="timeline-image">
								<a href="<?php echo $link_sobre; ?>">
									<img class="rounded-circle img-fluid" src="<?php echo $local_img_sobre; ?>">
								</a>
							</div>
							<div class="timeline-panel">
								<div class="timeline-heading">
										<h4><a href="<?php echo $link_sobre; ?>" class="text-dark"><?php echo $titulo_sobre; ?></a></h4>
										<h5 class="subheading font-italic"><a href="<?php echo $link_sobre; ?>" class="text-dark"><?php echo $subtitulo_sobre; ?></a></h5>
								</div>
								<div class="timeline-body">
										<p class="text-muted"><a href="<?php echo $link_sobre; ?>" class="text-dark"><?php echo $breve_descricao_sobre; ?></a></p>
								</div>
							</div>
						</li>
<?php

			if ($invertido == "") {
				$invertido = " timeline-inverted";
			} else {
				$invertido = "";
			}
		}

?>
						<li class="list-group-item timeline-inverted">
							<div class="timeline-image">
								<h4><a href="garanta_plano.php"><span class="text-light">Garanta já<br> o seu<br> Plano!</span></a></h4>
							</div>
						</li>
					</ul>
				</div>
			</div>
<?php

	}

?>
		</div>
	</section><br>
<?php

}

?>