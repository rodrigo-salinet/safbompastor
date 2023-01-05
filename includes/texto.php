<?php // Seção apresentação em texto da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }

$str_sql_texto = "SELECT * FROM textos WHERE ID_PAGINA='$id_pagina_atual';";
$sql_texto = mysqli_query($conexao,$str_sql_texto);

if (mysqli_num_rows($sql_texto) > 0) {
	mysqli_data_seek($sql_texto,0);
	$linha_texto = mysqli_fetch_assoc($sql_texto);
	$id_texto = $linha_texto['ID'];
	$titulo_texto = $linha_texto['TITULO_TEXTO'];
	$txt_paragrafo = str_replace("\n",'</p><p class="recuo">',$linha_texto['TXT_PARAGRAFO']);
	$img_texto = $linha_texto['LOCAL_IMG'];
	$link_botao_texto = $linha_texto['LINK_BOTAO'];
	$titulo_botao_texto = $linha_texto['TITULO_BOTAO'];
	$target_botao_texto = $linha_texto['TARGET_BOTAO'];

?>
	<?php if ($img_texto != '') { echo '<img class="img-fluid" src="' . $img_texto . '"><br>'; } ?>
	<section id="text" style="padding: 0px;">
		<div class="container-fluid">
			<blockquote class="blockquote text-justify p-3">
				<center><h1 class="h1 text-uppercase"<?php echo $titulo_responsivo; ?>><?php echo $titulo_texto; ?></h1></center>
				<p class="recuo"><?php echo $txt_paragrafo; ?></p>
				<footer class="blockquote-footer">SAF Bom Pastor <cite title="Respeito e Dignidade em todos os momentos da vida!">Respeito e Dignidade em todos os momentos da vida!</cite></footer>
<?php

if ($link_botao_texto != '' || $titulo_botao_texto != '') {

?>
				<p class="text-center"><a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" role="button" href="<?php echo $link_botao_texto; ?>" target="<?php echo $target_botao_texto; ?>"><?php echo $titulo_botao_texto; ?></a></p>
<?php

}

?>
			</blockquote>
		</div>
	</section>
<?php

	if ($id_texto == 11) {
		require_once('includes/portfolio.php');
	}

	if ($pg_atual == 'garanta_plano.php') {
		require_once('includes/planos.php');
		require_once('includes/portfolio.php');
	}
}

?>