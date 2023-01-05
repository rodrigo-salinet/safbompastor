<?php // Seção horário de atendimento da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }
?>
		<div class="container-fluid text-center" style="padding: 0px;">
			<h1 class="h1 bg-light"<?php echo $titulo_responsivo; ?>>HORÁRIOS DE ATENDIMENTO</h1>
		</div>
		<div class="container-fluid">
			<p class="lead" title="Aberto 24h">Atendimento Funeral: <span style="color: green;"><i class="fa fa-check"></i> <strong>SEMPRE ABERTO</strong></span></p>
			<p class="lead">Demais Atendimentos: das <strong>08:00 às 18:00</strong> <i class="fa fa-clock-o"></i></p>
		</div>