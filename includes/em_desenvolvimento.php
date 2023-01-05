<?php // Seção em desenvolvimento da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }
?>
	<section id="em_desenvolvimento">
		<div class="d-flex justify-content-center">
			<div class="row">
				<div class="col text-center">
					<span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-cogs fa-stack-1x fa-inverse"></i></span>
					<h4 class="section-heading text-dark">OPS! PÁGINA EM DESENVOLVIMENTO...</h4>
					<p class="text-muted"><i class="fa fa-toggle-off"></i> Logo logo aparece aqui.</p>
					<p class="text-muted"><i class="fa fa-refresh"></i> Tente amanhã por gentileza!</p>
				</div>
			</div>
		</div>
	</section>