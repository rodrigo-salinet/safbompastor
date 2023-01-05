<?php // Seção política e termos da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }
?>
				<div class="<?php echo $tamanho_colunas; ?>">  
					<ul class="list-inline quicklinks">
						<li class="list-inline-item"><a href="politica_privacidade.php" class="text-dark"><i class="fa fa-exclamation-triangle"></i> Política de Privacidade</a></li>
						<li class="list-inline-item"><a href="termos_uso.php" class="text-dark"><i class="fa fa-globe"></i> Termos de uso</a></li>
					</ul><br>
				</div>