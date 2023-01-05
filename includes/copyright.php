<?php // Seção copyright da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }
?>
				<div class="<?php echo $tamanho_colunas; ?>">
					<span class="copyright"><a href="copyright.php" class="text-dark" title="Todos os direitos reservados. Este site ou qualquer parte dele não pode ser reproduzido ou usado de forma alguma sem autorização expressa, por escrito, do autor ou editor, exceto pelo uso de citações breves em mídia digital."><i class="fa fa-copyright"></i> Copyright</a> - <span title="<?php echo $hash_aleatorio; ?>" onmouseup="window.alert('<?php echo $hash_aleatorio; ?>');">SAF Bom Pastor </span> 2021</span>
					<p>CNPJ: 25.183.893/0001-89</p>
				</div>