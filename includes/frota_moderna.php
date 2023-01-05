<?php // Seção frota moderna da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }

$str_sql_frota_moderna = "SELECT * FROM frota_moderna WHERE ID_PAGINA='$id_pagina_atual';";
$sql_frota_moderna = mysqli_query($conexao,$str_sql_frota_moderna);

if (mysqli_num_rows($sql_frota_moderna) > 0) {
	mysqli_data_seek($sql_frota_moderna,0);

?>
	<section id="frota_moderna" style="padding: 0px; background-image: url('assets/img/bg_fundo_frota_moderna.jpg'); background-repeat: repeat-y;">
		<div class="container-fluid">
<?php

	while ($linha_frota_moderna = mysqli_fetch_assoc($sql_frota_moderna)) {
		$id_frota_moderna = $linha_frota_moderna['ID']; //$msg.='|'.$id_frota_moderna;
		$img_frota_moderna = $linha_frota_moderna['LOCAL_IMG']; //$msg.='|'.$img_frota_moderna;
		$titulo_frota_moderna = $linha_frota_moderna['TITULO']; //$msg.='|'.$titulo_frota_moderna;
		$subtitulo_frota_moderna = $linha_frota_moderna['SUBTITULO']; //$msg.='|'.$subtitulo_frota_moderna;
		$video_frota_moderna = $linha_frota_moderna['HTML_VIDEO']; //$msg.='|'.$video_frota_moderna;
		$posicao_frota_moderna = $linha_frota_moderna['POSICAO']; //$msg.='|'.$posicao_frota_moderna;

		if ($video_frota_moderna == '') {
			if ($posicao_frota_moderna == "normal") {

?>
			<div class="row align-middle">
				<div class="col-sm d-flex flex-column justify-content-center align-items-center">
					<h1 class="h1"><strong><?php echo $titulo_frota_moderna; ?></strong></h1>
					<h2 class="h2"><?php echo $subtitulo_frota_moderna; ?></h2>
				</div>
				<div class="col-sm text-center">
					<img class="img-fluid" src="<?php echo $img_frota_moderna; ?>">
				</div>
			</div>
<?php

			} elseif ($posicao_frota_moderna == "invertida") {
			
?>
			<div class="row align-middle">
				<div class="col-sm text-center">
					<img class="img-fluid" src="<?php echo $img_frota_moderna; ?>">
				</div>
				<div class="col-sm d-flex flex-column justify-content-center align-items-center">
					<h1 class="h1"><strong><?php echo $titulo_frota_moderna; ?></strong></h1>
					<h2 class="h2"><?php echo $subtitulo_frota_moderna; ?></h2>
				</div>
			</div>
<?php

			}
		} else {

?>
			<div class="row-fluid">
				<div class="col embed-responsive embed-responsive-16by9">
					<center>
						<iframe 
							class="embed-responsive-item"
							src="<?php echo $video_frota_moderna; ?>"
							style="border:none;overflow:hidden;" 
							scrolling="no" 
							frameborder="0" 
							allowfullscreen="true"
							allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share;">
						</iframe>
					</center>
				</div>
			</div>
<?php

		}
	}

?>
		</div>
	</section>
<?php

}

?>