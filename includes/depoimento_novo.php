<?php // Seção depoimento novo da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }

$str_sql_depoimento_novo = "SELECT * FROM depoimentos ORDER BY ID DESC;";
$sql_depoimento_novo = mysqli_query($conexao,$str_sql_depoimento_novo);

if (mysqli_num_rows($sql_depoimento_novo) > 0) {

?>
	<hr>
	<div class="container-fluid">
<?php

	mysqli_data_seek($sql_depoimento_novo,0);
	$linha_depoimento_novo = mysqli_fetch_assoc($sql_depoimento_novo);

	$id_depoimento_novo = $linha_depoimento_novo['ID'];
	$titulo_depoimento_novo = $linha_depoimento_novo['TITULO'];
	$subtitulo_depoimento_novo = $linha_depoimento_novo['SUBTITULO'];
	$txt_medio_depoimento_novo = $linha_depoimento_novo['TXT_MEDIO'];
	$cidade_depoimento_novo = $linha_depoimento_novo['CIDADE'];
	//$url_depoimento_novo = $linha_depoimento_novo['URL'];
	$url_depoimento_novo = "depoimento.php?id_depoimento=$id_depoimento_novo";
	$local_img_depoimento_novo = $linha_depoimento_novo['LOCAL_IMG'];

?>
		<div class="row align-items-center">
			<div class="col-lg">
				<a href="<?php echo $url_depoimento_novo; ?>"><h1 class="h1 text-dark font-italic text-right"<?php echo $titulo_responsivo; ?>><strong>"<?php echo $txt_medio_depoimento_novo; ?>"</strong></h1></a>

				<a href="<?php echo $url_depoimento_novo; ?>"><h3 class="h4 text-dark text-right"><?php echo $titulo_depoimento_novo; ?> | <?php echo $cidade_depoimento_novo; ?></h3></a>

				<a href="<?php echo $url_depoimento_novo; ?>"><h5 class="h5 text-dark font-italic text-right"><?php echo $subtitulo_depoimento_novo; ?></h5></a>
			</div>
			<div class="col-sm-auto">
				<a href="<?php echo $url_depoimento_novo; ?>"><img class="rounded-circle img-fluid bg-primary" src="<?php echo $local_img_depoimento_novo; ?>"></a>
			</div>
		</div>
		<div class="row-fluid text-right"><a class="link" href="depoimentos.php">Veja mais depoimentos</a></div>
	</div>
	<hr>
<?php

}

?>