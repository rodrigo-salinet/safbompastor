<?php // Seção apoiadores da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }

$str_sql_logos_apoiadores = "SELECT * FROM apoiadores WHERE ID_PAGINA='$id_pagina_atual';";
$sql_logos_apoiadores = mysqli_query($conexao,$str_sql_logos_apoiadores);

if (mysqli_num_rows($sql_logos_apoiadores) > 0) {
	mysqli_data_seek($sql_logos_apoiadores,0);
?>
	<section class="py-5" style="padding: 10px;">
		<div class="container-fluid bg-light">
			<h1 class="h1 text-center"<?php echo $titulo_responsivo; ?>>APOIADORES</h1>
		</div>
		<div class="container-fluid">
			<div class="row">
<?php

	while ($linha_logos_apoiadores = mysqli_fetch_assoc($sql_logos_apoiadores)) {
		$id_logo_apoiador = $linha_logos_apoiadores['ID'];
		$link_externo_logo_apoiador = $linha_logos_apoiadores['LINK_EXTERNO'];
		$local_img_logo_apoiador = $linha_logos_apoiadores['LOCAL_IMG_LOGO'];
		$target_logo_apoiador = $linha_logos_apoiadores['TARGET'];

?>
					<div class="col-sm-6 col-md-3"><a href="<?php echo $link_externo_logo_apoiador; ?>" target="<?php echo $target_logo_apoiador; ?>"><img class="img-fluid d-block mx-auto" src="<?php echo $local_img_logo_apoiador; ?>"></a></div>
<?php

	}

?>
				</div>
			</div>
		</section>
<?php

}

?>