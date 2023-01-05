<?php // Seção sobre da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }

$str_sql_depoimentos = "SELECT * FROM depoimentos ORDER BY ANO DESC, MES DESC, DIA DESC;";
$sql_depoimentos = mysqli_query($conexao,$str_sql_depoimentos);

if (mysqli_num_rows($sql_depoimentos) > 0) {
	mysqli_data_seek($sql_depoimentos,0);

?>
	<section id="about" style="padding: 2px;">
		<div class="container-fluid">
			<div class="row bg-light">
				<div class="col-lg text-center">
					<h1 class="h1 text-center"<?php echo $titulo_responsivo; ?>>Veja <strong>DEPOIMENTOS</strong></h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg">
					<ul class="list-group timeline">
<?php

	$invertido = "";
	while ($linha_depoimento = mysqli_fetch_assoc($sql_depoimentos)) {
		$id_depoimento = $linha_depoimento['ID'];
		$titulo_depoimento = $linha_depoimento['TITULO'];
		$subtitulo_depoimento = $linha_depoimento['SUBTITULO'];
		//$url_depoimento = $linha_depoimento['URL'];
		$url_depoimento = "depoimento.php?id_depoimento=$id_depoimento";
		$local_img_depoimento = $linha_depoimento['LOCAL_IMG'];
		$txt_medio_depoimento = $linha_depoimento['TXT_MEDIO'];
		$ano_depoimento = $linha_depoimento['ANO'];
		$mes_depoimento = $linha_depoimento['MES'];
		$dia_depoimento = $linha_depoimento['DIA'];
		$cidade_depoimento = $linha_depoimento['CIDADE'];
		$uf_depoimento = $linha_depoimento['UF'];

?>
						<li class="list-group-item<?php echo $invertido; ?>">
							<div class="timeline-image">
								<a href="<?php echo $url_depoimento; ?>">
									<img class="rounded-circle img-fluid" src="<?php echo $local_img_depoimento; ?>">
								</a>
							</div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h3 class="h3"><a href="<?php echo $url_depoimento; ?>" class="text-dark font-italic">"<?php echo $txt_medio_depoimento; ?>"</a></h3>
									<h1 class="subheading"<?php echo $titulo_responsivo; ?>><a href="<?php echo $url_depoimento; ?>" class="text-dark"><?php echo $titulo_depoimento; ?></a></h1>
									<h4 class="h4"><a href="<?php echo $url_depoimento; ?>" class="text-dark"><?php echo $cidade_depoimento; ?> / <?php echo $uf_depoimento; ?></a></h4>
								</div>
								<div class="timeline-body">
										<p class="text-muted">
											<a href="<?php echo $url_depoimento; ?>" class="text-dark">
												<span class="font-italic"><?php echo $subtitulo_depoimento; ?></span>
												<!-- span><br><?php echo $dia_depoimento; ?> /
												<?php echo $mes_depoimento; ?> /
												<?php echo $ano_depoimento; ?></span-->
											</a>
										</p>
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
		</div>
	</section><br><br>
<?php

}

?>