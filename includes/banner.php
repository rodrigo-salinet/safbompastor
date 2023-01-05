<?php // Seção banner da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }

//$str_sql_banners = "SELECT * FROM banners WHERE ID_PAGINA='$id_pagina_atual' ORDER BY SEQUENCIA ASC;";
$str_sql_banners = "
	SELECT * FROM banners 
	WHERE 
	ID_PAGINA = '$id_pagina_atual' AND 
	INICIO_DIA <= '$dia_atual' AND 
	INICIO_MES <= '$mes_atual' AND 
	INICIO_ANO <= '$ano_atual' AND 
	FIM_DIA >= '$dia_atual' AND 
	FIM_MES >= '$mes_atual' AND 
	FIM_ANO >= '$ano_atual' 
	ORDER BY SEQUENCIA ASC;
	";
//$msg .= $str_sql_banners;
$sql_banners = mysqli_query($conexao,$str_sql_banners);
//$msg .= htmlentities($str_sql_banners);

if (mysqli_num_rows($sql_banners) > 0) {

?>
	<section id="carousel_banners" style="padding: 0px;" class="carousel">
		<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carousel" data-slide-to="0" class="active"></li>
<?php

	$ii = 1;
	if (mysqli_num_rows($sql_banners) > $ii) {
		mysqli_data_seek($sql_banners,$ii);
		while ($linha_banners = mysqli_fetch_assoc($sql_banners)) {
			$nome_banner = $linha_banners['NOME'];
			/*$inicio_dia_banner = $linha_banners['INICIO_DIA'];
			$inicio_mes_banner = $linha_banners['INICIO_MES'];
			$inicio_ano_banner = $linha_banners['INICIO_ANO'];
			$fim_dia_banner = $linha_banners['FIM_DIA'];
			$fim_mes_banner = $linha_banners['FIM_MES'];
			$fim_ano_banner = $linha_banners['FIM_ANO'];

			$bn_liberado = banner_liberado($inicio_ano_banner,$inicio_mes_banner,$inicio_dia_banner,$ano_atual,$mes_atual,$dia_atual);
			$bn_vencido = banner_vencido($fim_ano_banner,$fim_mes_banner,$fim_dia_banner,$ano_atual,$mes_atual,$dia_atual);
			$msg .= "$nome_banner: data [$fim_dia_banner/$fim_mes_banner/$fim_ano_banner] -  liberado [$bn_liberado] - vencido [$bn_vencido]; ";
			if ($bn_liberado == 'N') {
				continue;
			}
			if ($bn_vencido == 'S') {
				continue;
			}*/

?>
				<li data-target="#carousel" data-slide-to="<?php echo $ii; ?>"></li>
<?php
			$ii++;
		}
	}
?>
			</ol>

			<div class="carousel-inner carousel-zoom">
<?php

	$ii = 0;
	mysqli_data_seek($sql_banners,$ii);
	while ($linha_banners = mysqli_fetch_assoc($sql_banners)) {
		$txt_local_img = $linha_banners['LOCAL_IMG'];
		$txt_titulo = $linha_banners['TITULO'];
		$txt_link = $linha_banners['LINK'];
		$txt_target = $linha_banners['TARGET'];

		$classe_carousel_item = "";
		if ($ii == 0) {
			$classe_carousel_item = " active";
		}
		
		$nome_banner = $linha_banners['NOME'];
		/*$inicio_dia_banner = $linha_banners['INICIO_DIA'];
		$inicio_mes_banner = $linha_banners['INICIO_MES'];
		$inicio_ano_banner = $linha_banners['INICIO_ANO'];
		$fim_dia_banner = $linha_banners['FIM_DIA'];
		$fim_mes_banner = $linha_banners['FIM_MES'];
		$fim_ano_banner = $linha_banners['FIM_ANO'];

		$bn_liberado = banner_liberado($inicio_ano_banner,$inicio_mes_banner,$inicio_dia_banner,$ano_atual,$mes_atual,$dia_atual);
		$bn_vencido = banner_vencido($fim_ano_banner,$fim_mes_banner,$fim_dia_banner,$ano_atual,$mes_atual,$dia_atual);
		if ($bn_liberado == 'N') {
			$msg .= "$nome_banner: data [$fim_dia_banner/$fim_mes_banner/$fim_ano_banner] -  liberado [$bn_liberado] - vencido [$bn_vencido]; ";
			continue;
		}
		if ($bn_vencido == 'S') {
			$msg .= "$nome_banner: data [$fim_dia_banner/$fim_mes_banner/$fim_ano_banner] -  liberado [$bn_liberado] - vencido [$bn_vencido]; ";
			continue;
		}*/

		if ($txt_link == '') {
			$txt_link = "javascript:window.alert('Oba! Obrigado por sua visita.')";
		}
?>
				<div class="carousel-item<?php echo $classe_carousel_item; ?>" id="csl_<?php echo $ii; ?>">
					<a href="<?php echo $txt_link; ?>" target="<?php echo $txt_target; ?>" title="<?php echo $txt_titulo; ?>">
						<img class="img img-responsive" src="<?php echo $txt_local_img; ?>" style="width: 100%;">
					</a>
				</div>
<?php

		$ii++;
	}
	mysqli_data_seek($sql_banners,0);

?>
			</div>
			<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Anterior</span>
			</a>
			<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Próximo</span>
			</a>
		</div>
	</section>
<?php

}

?>