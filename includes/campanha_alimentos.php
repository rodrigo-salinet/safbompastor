<?php // Seção início do corpo da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }

$str_sql_cidades_campanha_alimentos = "SELECT * FROM cidades_campanha_alimentos ORDER BY ID;";
$sql_cidades_campanha_alimentos = mysqli_query($conexao,$str_sql_cidades_campanha_alimentos);
if (@mysqli_num_rows($sql_cidades_campanha_alimentos) > 0) {
	mysqli_data_seek($sql_cidades_campanha_alimentos,0);

?>
	<div class="container-fluid bg-light">
		<h1 class="h1 text-center"<?php echo $titulo_responsivo; ?>>Pontos de coleta da Campanha:<br>
			<strong><u>S</u>UA DOAÇÃO <u>A</u>LIMENTA <u>F</u>AMÍLIAS</strong></h1>
	</div>
	<section id="campanha_alimentos" class="mb-5" style="padding: 0px;">
		<div id="carousel-4" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
<?php
	
	$n_slide = 1;
	$iniciou = "N";
	$primeiro_slide = "S";
	$num_linha = 0;
	$num_linhas = 0;

	while ($linha_cidades_campanha_alimentos = mysqli_fetch_assoc($sql_cidades_campanha_alimentos)) {
		$id_cidade_campanha_alimentos = $linha_cidades_campanha_alimentos['ID'];
		$cidade_campanha_alimentos = $linha_cidades_campanha_alimentos['CIDADE'];

		if ($n_slide == 1 && $iniciou == "N") {
			$iniciou = "S";
			if ($primeiro_slide == "S") {
				$slide_ativo = " active";
				$primeiro_slide = "N";
			} else {
				$slide_ativo = "";
			}
?>
				<div class="carousel-item<?php echo $slide_ativo; ?>">
					<div class="container">
						<div class="row">
<?php

		}

		$str_sql_campanha_alimentos = "SELECT * FROM campanha_alimentos WHERE ID_CIDADE='$id_cidade_campanha_alimentos' ORDER BY NOME_EMPRESA;";
		$sql_campanha_alimentos = mysqli_query($conexao,$str_sql_campanha_alimentos);

		if (@mysqli_num_rows($sql_campanha_alimentos) > 0) {
			mysqli_data_seek($sql_campanha_alimentos,0);
			$num_linhas += @mysqli_num_rows($sql_campanha_alimentos);
			while ($linha_campanha_alimentos = mysqli_fetch_assoc($sql_campanha_alimentos)) {
				$num_linha++;
				$id_campanha_alimentos = $linha_campanha_alimentos['ID'];
				$empresa_campanha_alimentos = $linha_campanha_alimentos['NOME_EMPRESA'];
				$endereco_campanha_alimentos = $linha_campanha_alimentos['ENDERECO'];

				if ($n_slide == 1 && $iniciou == "N") {
					$iniciou = "S";

?>
				<div class="carousel-item">
					<div class="container">
						<div class="row">
<?php

				}

?>
							<div class="col-sm-4 p-3" style="background-color: #063A5C; border: 5px solid #fff;">
								<h4 class="text-white">
									<span class="fa-stack fa-1x">
										<i class="fa fa-circle fa-stack-2x text-primary"></i>
										<i class="fa fa-map fa-stack-1x fa-inverse text-dark"></i>
									</span>
									<?php echo $cidade_campanha_alimentos; ?>
								</h4>
								<p class="text-white">
									<span class="fa-stack fa-1x">
										<i class="fa fa-circle fa-stack-2x text-primary"></i>
										<i class="fa fa-building fa-stack-1x fa-inverse text-dark"></i>
									</span>
									<?php echo $empresa_campanha_alimentos; ?>
								</p>
								<p class="text-white">
									<span class="fa-stack fa-1x">
										<i class="fa fa-circle fa-stack-2x text-primary"></i>
										<i class="fa fa-map-marker fa-stack-1x fa-inverse text-dark"></i>
									</span> 
									<?php echo $endereco_campanha_alimentos; ?>
								</p>
								<p class="text-center"><img class="p-0" src="assets/img/caixa_coleta.png"></p>
							</div>
<?php
				
				if ($n_slide == 3) {
					$iniciou = "N";
					$n_slide = 1;
					
?>
						</div>
					</div>
				</div>
<?php

				} else {
					$n_slide++;
				}
			}
		}
		
	}
	if ($num_linha == $num_linhas && $iniciou == "S") {

?>
						</div>
					</div>
				</div>
<?php

	}

?>
			
			</div>

			<a class="carousel-control-prev" href="#carousel-4" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
				<span class="sr-only">prev</span>
			</a>

			<a class="carousel-control-next" href="#carousel-4" role="button" data-slide="next">
				<span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
				<span class="sr-only">next</span>
			</a>
		</div>
	</section><hr>
<?php

}
				
?>
