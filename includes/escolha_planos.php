<?php // Seção plano da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }

$str_sql_planos = "SELECT * FROM planos ORDER BY ID;";
$sql_planos = mysqli_query($conexao,$str_sql_planos);

if (mysqli_num_rows($sql_planos) > 0) {
	mysqli_data_seek($sql_planos,0);

	while ($linha_planos = mysqli_fetch_assoc($sql_planos)) {
		$id_plano = $linha_planos['ID'];
		$titulo_plano = $linha_planos['TITULO'];
		$subtitulo_plano = $linha_planos['SUBTITULO'];
		$banner_plano = $linha_planos['LOCAL_IMG_MAIOR'];

?>
	<section id="carousel" class="carousel" style="padding: 0px;">
		<div id="carousel_banners" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block w-100" src="<?php echo $banner_plano; ?>">
				</div>
			</div>
		</div>
	</section>
	<section id="plano<?php echo $id_plano; ?>" style="padding: 10px;">
		<div class="container-fluid">
<?php
			
		$str_sql_planos_secoes = "SELECT * FROM planos_secoes ORDER BY ID;";
		$sql_planos_secoes = mysqli_query($conexao,$str_sql_planos_secoes);

		if (mysqli_num_rows($sql_planos_secoes) > 0) {
			mysqli_data_seek($sql_planos_secoes,0);

?>
			<div class="row text-center">
<?php

			while ($linha_planos_secoes = mysqli_fetch_assoc($sql_planos_secoes)) {

				$id_plano_secao = $linha_planos_secoes['ID'];
				$icone_plano_secao = $linha_planos_secoes['ICONE'];
				$secao_plano = $linha_planos_secoes['SECAO'];

?>
				<div class="col-md">
					<!-- tamanho do bloco -->
					<span class="fa-stack fa-4x">
						<!-- formato do bloco -->
						<i class="fa fa-circle fa-stack-2x text-danger"></i>
						<!-- icone do bloco -->
						<i class="fa fa-<?php echo $icone_plano_secao;?> fa-stack-1x fa-inverse"></i>
					</span>
					<h4 class="section-heading text-info"><?php echo $secao_plano; ?></h4>
					<p class="text-left text-info">
<?php

				$str_sql_planos_itens = "SELECT * FROM planos_itens WHERE ID_PLANO='$id_plano' AND ID_SECAO_PLANO='$id_plano_secao' ORDER BY ID;";
				$sql_planos_itens = mysqli_query($conexao,$str_sql_planos_itens);

				if (mysqli_num_rows($sql_planos_itens) > 0) {
					mysqli_data_seek($sql_planos_itens,0);

					while ($linha_planos_itens = mysqli_fetch_assoc($sql_planos_itens)) {
						$id_plano_item = $linha_planos_itens['ID'];
						$icone_item_plano = $linha_planos_itens['ICONE'];
						$item_plano = $linha_planos_itens['ITEM'];

?>
						<i class="fa fa-<?php echo $icone_item_plano; ?> text-danger"></i>
						<?php echo $item_plano; ?><br>
<?php

					}

?>
					</p>
				</div>
<?php

				}
			}

?>
			</div>
			<div class="row">
				<div class="col text-center">
					<a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" role="button" href="https://api.whatsapp.com/send?phone=554331780900&text=Olá!%20Quero%20o%20<?php echo str_replace(" ", "%20", $titulo_plano) ; ?>." target="_blank">QUERO <?php echo $titulo_plano ; ?>!</a>
				</div>
			</div>
		</div>
	</section>
<?php

		}
	}
}

?>