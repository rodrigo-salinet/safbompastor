<?php // Seção google analyticts da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }

if ($host_atual != "localhost") {
?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-FV6NN9GNSC"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'G-FV6NN9GNSC');
		</script>
<?php

}

?>