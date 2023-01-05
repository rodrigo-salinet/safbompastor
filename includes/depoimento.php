<?php // Seção sobre da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }

$id_depoimento = '';
if (isset($_GET['id_depoimento'])) {
	$id_depoimento = $_GET['id_depoimento'];
}

$str_sql_depoimento = "SELECT * FROM depoimentos WHERE ID=$id_depoimento;";
$sql_depoimento = mysqli_query($conexao,$str_sql_depoimento);

if (@mysqli_num_rows($sql_depoimento) > 0) {
	mysqli_data_seek($sql_depoimento,0);
	$linha_depoimento = mysqli_fetch_assoc($sql_depoimento);

	$titulo_depoimento = $linha_depoimento['TITULO'];
	$titulo_pagina = "Depoimento de $titulo_depoimento";
	$subtitulo_depoimento = $linha_depoimento['SUBTITULO'];
	$local_img_depoimento = $linha_depoimento['LOCAL_IMG'];
	$local_video_depoimento = $linha_depoimento['LOCAL_VIDEO'];
	$txt_longo_depoimento = $linha_depoimento['TXT_LONGO'];
	$ano_depoimento = $linha_depoimento['ANO'];
	$mes_depoimento = $linha_depoimento['MES'];
	$dia_depoimento = $linha_depoimento['DIA'];
	$cidade_depoimento = $linha_depoimento['CIDADE'];
	$uf_depoimento = $linha_depoimento['UF'];

?>
	<section id="about" style="padding: 2px;">
		<div class="container-fluid">
			<div class="row bg-light">
				<div class="col-lg text-center">
					<h1 class="h1 text-center">Depoimento de <strong><?php echo $titulo_depoimento; ?></strong></h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg">
					<ul class="list-group timeline">
						<li class="list-group-item<?php echo $invertido; ?>">
							<div class="timeline-image">
								<img class="rounded-circle img-fluid" src="<?php echo $local_img_depoimento; ?>">
							</div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h3 class="h3">"<?php echo $txt_longo_depoimento; ?>"</h3>
									<h1 class="subheading"><?php echo $titulo_depoimento; ?></h1>
									<h4 class="h4"><?php echo $cidade_depoimento; ?> / <?php echo $uf_depoimento; ?></h4>
								</div>
								<div class="timeline-body">
										<p class="text-muted">
											<span class="font-italic"><?php echo $subtitulo_depoimento; ?></span>
											<!-- span><br><?php echo $dia_depoimento; ?> /
											<?php echo $mes_depoimento; ?> /
											<?php echo $ano_depoimento; ?></span-->
										</p>
								</div>
							</div>
						</li>
						<li class="list-group-item timeline-inverted">
							<div class="timeline-image">
								<h4><a href="garanta_plano.php"><span class="text-light">Garanta já<br> o seu<br> Plano!</span></a></h4>
							</div>
						</li><br>
					</ul>
				</div>
			</div>
			<div class="row bg-light">
				<div class="col-lg text-center">
					<h1 class="h1 text-center">Confira o VÍDEO</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg text-center">
					<div class="embed-responsive embed-responsive-16by9">
						<center>
							<iframe 
								class="embed-responsive-item"
								src="<?php echo $local_video_depoimento; ?>"
								style="border:none;overflow:hidden;" 
								scrolling="no" 
								frameborder="0" 
								allowfullscreen="true"
								allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share;">
							</iframe>
						</center>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php

} else {
	header('Location: index.php?msg=' . htmlspecialchars("Ops! Algo de errado não está certo. Por favor, verifique e tente novamente. Obrigado."));
}

?>