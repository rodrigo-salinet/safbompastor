<?php // Seção serviços da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }

$str_sql_titulo_servico = "SELECT * FROM titulos_servicos WHERE ID_PAGINA='$id_pagina_atual';";
$sql_titulo_servico = mysqli_query($conexao,$str_sql_titulo_servico);

if (mysqli_num_rows($sql_titulo_servico) > 0) {
	mysqli_data_seek($sql_titulo_servico,0);

	while($linha_titulo_servico = mysqli_fetch_assoc($sql_titulo_servico)) {
		$id_titulo_servico = $linha_titulo_servico['ID'];

?>
	<section id="servico<?php echo $id_titulo_servico; ?>" style="padding: 10px;">
		<div class="container-fluid">
<?php

		$titulo_principal = $linha_titulo_servico['TITULO'];
		$link_titulo_servico = $linha_titulo_servico['LINK_TITULO'];
		$subtitulo_servico = $linha_titulo_servico['SUBTITULO'];

?>
			<div class="row bg-light">
				<div class="col-xl text-center">
					<h1 class="h1 text-center"><?php echo $titulo_principal; ?></h1>
				</div>
			</div>
<?php

		$str_sql_servicos = "SELECT * FROM servicos WHERE ID_TITULOS_SERVICOS='$id_titulo_servico';";
		$sql_servicos = mysqli_query($conexao,$str_sql_servicos);

		if (mysqli_num_rows($sql_servicos) > 0) {

?>
			<div class="row text-center">
<?php

			mysqli_data_seek($sql_servicos,0);
			while ($linha_servicos = mysqli_fetch_assoc($sql_servicos)) {
				$id_servico = $linha_servicos['ID'];
				$link_src_servico = $linha_servicos['LINK_SRC'];
				$fa_icone_formato_servico = $linha_servicos['FA_ICONE_FORMATO'];
				$fa_icone_servico = $linha_servicos['FA_ICONE'];
				$titulo_servico = $linha_servicos['TITULO'];
				$descricao_servico = str_replace("\n","<br/>",$linha_servicos['DESCRICAO']);

?>
				<div class="col-md">
					<a href="<?php echo $link_src_servico; ?>">
						<!-- tamanho do bloco -->
						<span class="fa-stack fa-4x">
							<!-- formato do bloco -->
							<i class="fa fa-<?php echo $fa_icone_formato_servico;?> fa-stack-2x text-danger"></i>
							<!-- icone do bloco -->
							<i class="fa fa-<?php echo $fa_icone_servico;?> fa-stack-1x fa-inverse"></i>
						</span>
						<h4 class="section-heading text-info"><?php echo $titulo_servico; ?></h4>
						<p class="text-left text-info"><?php echo $descricao_servico; ?></p>
					</a>
				</div>
<?php

			}

?>
			</div>
<?php

			if ($pg_atual != "index.php") {

?>
			<div class="row">
				<div class="col text-center">
					<a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" role="button" href="https://api.whatsapp.com/send?phone=554331780900&text=Olá!%20Quero%20o%20<?php echo str_replace(" ", "%20", $titulo_principal) ; ?>." target="_blank">QUERO <?php echo $titulo_principal ; ?>!</a>
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
}

?>