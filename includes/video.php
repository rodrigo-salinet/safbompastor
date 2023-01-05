<?php // Seção busca da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }

$str_sql_video = "SELECT * FROM videos WHERE ID_PAGINA='$id_pagina_atual';";
$sql_video = mysqli_query($conexao,$str_sql_video);

if (mysqli_num_rows($sql_video) > 0) {
	mysqli_data_seek($sql_video,0);
	$linha_video = mysqli_fetch_assoc($sql_video);
	$id_video = $linha_video['ID'];
	$html_video = $linha_video['HTML'];

?>
	<section style="padding: 10px;">
		<div class="embed-responsive embed-responsive-16by9">
			<center>
				<iframe 
					class="embed-responsive-item"
					src="<?php echo $html_video; ?>"
					style="border:none;overflow:hidden;" 
					scrolling="no" 
					frameborder="0" 
					allowfullscreen="true"
					allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share;">
				</iframe>
			</center>
		</div>
	</section>
<?php

}

?>