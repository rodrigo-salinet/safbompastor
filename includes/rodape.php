<?php // Seção rodapé da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }
?>
	<!-- Janela modal para a função nao_va_embora(); -->
	<div class="modal fade" role="dialog" tabindex="-1" id="portfolioModalSaida" onclose="javascript: fechou_retencao = true;">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="h1 text-uppercase">FIQUE MAIS! QUERO FALAR COM VOCÊ.</h1>
					<button type="button" class="close" data-dismiss="modal" aria-label="Fechar" onclick="javascript: fechou_retencao = true;"></button>
          			<span aria-hidden="true">&times;</span>
				</div>
				<div class="modal-body">
					<h3 class="h3">Posso te mostrar que ser um cliente SAF Bom Pastor tem muitas vantagens! Para você, sua família e empresa.</h3>
					<h5 class="h5">Te espero para um cafézinho <i class="fa fa-cofee"></i> aqui na SAF Bom Pastor de Ibiporã/PR, Rua Osvaldo Cruz, 466, Centro.</h5>
					<p class="item-intro text-muted">Me chama no whatsapp <a href="https://api.whatsapp.com/send?phone=554331780900&text=Olá!%20Quero%20ser%20atendido(a)."><i class="fa fa-whatsapp"></i></a>!</p>
					<div class="container" style="padding: 0px;" id="modal_mapa_google_maps">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3665.223782184028!2d-51.05312218534477!3d-23.27131705682946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94eb4728f29e1ecf%3A0xab8679fdfea7ecaa!2sSAF%20Bom%20Pastor!5e0!3m2!1spt-BR!2sbr!4v1616586703672!5m2!1spt-BR!2sbr" frameborder="0" width="100%" height="450" style="border:0;" loading="lazy" marginwidth="0" marginheight="0" scrolling="no"></iframe>
					</div>
				</div>
				<div class="modal-footer">
					<footer class="blockquote-footer">SAF Bom Pastor <cite title="Respeito e Dignidade em todos os momentos da vida!">Respeito e Dignidade em todos os momentos da vida!</cite></footer>
					<button class="btn btn-primary" data-dismiss="modal" type="button" onclick="javascript: fechou_retencao = true;"><i class="fa fa-times"></i><span> Fechar</span></button>
				</div>
			</div>
		</div>
	</div>

	<!-- Botão flutuante do whatsapp -->
	<a href="https://api.whatsapp.com/send?phone=554331780900&text=Olá!%20Quero%20ser%20atendido(a)." class="lnk_wpp" target="_blank">
		<i class="fa fa-whatsapp btn_wpp" title="Whatsapp"></i>
	</a>

	<!-- botão flutuante voltar ao topo -->
	<a href="#top" class="lnk_top" target="_self">
		<i class="fa fa-angle-double-up btn_top" name="btn_topo" title="Ir ao topo"></i>
	</a>

	<!-- popup cookies -->
	<div class="nk-cookie-banner alert alert-dark text-center mb-0" role="alert">
		<i class="fa fa-exclamation-triangle"></i> Este website utiliza cookies para garantir que você tenha uma melhor experiência de navegação.
		<a href="politica_privacidade.php" class="btn btn-primary btn-sm text-danger" target="_blank" rel="noopener noreferrer">Ler mais <i class="fa fa-folder-open-o"></i></a>
		<button type="button" class="btn btn-primary btn-sm ml-3 text-dark" onclick="window.nk_hideCookieBanner()">
			Entendi <i class="fa fa-check"></i>
		</button><br><br><br>
	</div>
	<script async="" src="assets/js/cookie-banner.js"></script>

	<!-- carregamento do módulo jquery do tema Agency -->
	<script src="assets/js/jquery.min.js?h=<?php echo $hash_aleatorio; ?>"></script>

	<!-- carregamento do módulo bootstrap do tema Agency -->
	<script src="assets/bootstrap/js/bootstrap.min.js?h=<?php echo $hash_aleatorio; ?>"></script>

	<!-- carregamento do módulo jquery easing do tema Agency -->
	<script src="assets/bootstrap/js/jquery.easing.min.js?h=<?php echo $hash_aleatorio; ?>"></script>

	<!-- carregamento do módulo agency do tema Agency -->
	<script src="assets/bootstrap/js/agency.js?h=<?php echo $hash_aleatorio; ?>"></script>

	<!-- carregamento do módulo intervalos dos carousels -->
	<script src="assets/js/carousels.intervals.js?h=<?php echo $hash_aleatorio; ?>"></script>

	<!-- carregamento do módulo de inatividade do usuário -->
	<script src="assets/js/inatividade.js?h=<?php echo $hash_aleatorio; ?>"></script>

	<!-- Seção script dinâmico php/js -->
	<script type="text/javascript" language="javascript">
<?php

$msg_get = trim(@$_GET['msg']);

if ($msg == NULL) {
	$msg = $msg_get;
} else {
	if ($msg_get != '') {
		$msg .= " | " . $msg_get;
	}
}

?>
		// Aplicar variável php $titulo_pagina ao título da página
		document.title = '<?php echo $titulo_pagina; ?>';
<?php
	
if (@$msg != '') {

?>
		// Exibir mensagem msg, caso exista
		window.alert('<?php echo $msg; ?>');
<?php

}

if ($pesquisa_txt != '') {

?>
		/* ****** */
<?php

}

?>
		//document.onload = monitor1();
		//document.onmousedown = alert('onmousedown');
		$(document).mouseleave(function () {
			mostrar_modal();
		});
		
	</script>