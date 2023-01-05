<?php // Seção apresentação de biografia da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }

$id_bio = @$_GET['id_bio'];

if ($id_bio != '' && $id_pagina_atual == '48') {
	$str_sql_biografia = "SELECT * FROM biografias WHERE ID='$id_bio';";
	$sql_biografia = mysqli_query($conexao,$str_sql_biografia);

	if (mysqli_num_rows($sql_biografia) > 0) {
		mysqli_data_seek($sql_biografia,0);
		$linha_biografia = mysqli_fetch_assoc($sql_biografia);

		$id_biografia = $linha_biografia['ID'];
		$nome_biografia = $linha_biografia['NOME'];
		$funcao_biografia = $linha_biografia['FUNCAO'];
		$descricao_biografia = $linha_biografia['DESCRICAO'];
		$local_img_alta_biografia = $linha_biografia['LOCAL_IMG_ALTA'];

		$texto_apresentacao_biografia = str_replace("\n","<br/>",$linha_biografia['TEXTO_APRESENTACAO']);

?>
	<section id="text" class="text" style="padding: 10px;">
		<div class="container-fluid text">
			<blockquote class="blockquote text-justify p-3">
				<center><img class="img-fluid" src="<?php echo $local_img_alta_biografia; ?>"><br/>
				<h1 class="h1"><?php echo $nome_biografia; ?></h1>
				<h3 class="text-muted"><?php echo $funcao_biografia; ?></h3>
				<h5><i><?php echo $descricao_biografia; ?></i></h5></center>
				<p><?php echo $texto_apresentacao_biografia; ?></p>
				<footer class="blockquote-footer">SAF Bom Pastor <cite title="Respeito e Dignidade em todos os momentos da vida!">Respeito e Dignidade em todos os momentos da vida!</cite></footer>
			</blockquote>
		</div>
	</section>
<?php

	}
} elseif ($id_pagina_atual == '48') {

?>
	<section id="text">
		<div class="container-fluid text">
			<blockquote class="blockquote text-justify p-3">
				<center>OPS! Biografia não encontrada.<br/>
				<p><a href="javascript:window.history.back();">Clique aqui</a> para voltar</p>
				<footer class="blockquote-footer">SAF Bom Pastor <cite title="Respeito e Dignidade em todos os momentos da vida!">Respeito e Dignidade em todos os momentos da vida!</cite></footer>
			</blockquote>
		</div>
	</section>
<?php

}

?>