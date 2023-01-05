<?php // Seção mapa da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }
?>
	<div class="container-fluid text-center" style="padding: 0px;">
		<h1 class="h1 bg-light"<?php echo $titulo_responsivo; ?>>LOCALIZAÇÃO</h1>
	</div>
	<div class="container-fluid" style="padding: 0px;" id="mapa_google_maps">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3665.223782184028!2d-51.05312218534477!3d-23.27131705682946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94eb4728f29e1ecf%3A0xab8679fdfea7ecaa!2sSAF%20Bom%20Pastor!5e0!3m2!1spt-BR!2sbr!4v1616586703672!5m2!1spt-BR!2sbr" frameborder="0" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" marginwidth="0" marginheight="0" scrolling="no"></iframe>
	</div>