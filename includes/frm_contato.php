<?php // Seção formulário de contato da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }
?>
	<section id="contact" style="background-image:url('assets/img/map-image.jpg'); background-color: #000C1F;">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg text-center">
					<h2 class="text-uppercase section-heading">Entre em Contato</h2>
					<h3 class="section-subheading text-muted">Envie uma mensagem pra gente.</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-lg">
					<form action="enviar_email.php" method="post" id="frm_contato" name="frm_contato" novalidate>
						<input type="hidden" id="enviarFormulario" name="enviarFormulario" value="enviar">
						<input type="hidden" id="assunto" name="assunto" value="Formulário de contato do site www.safbompastor.com.br">
						<input type="hidden" id="para" name="para" value="contato@safbompastor.com.br">
						<div class="form-row">
							<div class="col col-md-6">
								<div class="form-group">
									<label class="label text-white" for="remetenteNome">Nome:</label>
									<input class="form-control" type="text" id="remetenteNome" name="remetenteNome"
										placeholder="Digite seu nome aqui *" required>
									<small class="form-text text-danger flex-grow-1 help-block lead"></small>
								</div>
								<div class="form-group">
									<label class="label text-white" for="remetenteEmail">Email:</label>
									<input class="form-control" type="email" id="remetenteEmail" name="remetenteEmail"
										placeholder="Digite seu Email aqui *" required>
									<small class="form-text text-danger help-block lead"></small>
								</div>
								<div class="form-group">
									<label class="label text-white" for="tel">Fone/Whatsapp:</label>
									<input class="form-control" type="tel" id="tel" name="tel"
										placeholder="Digite seu telefone/whatsapp aqui *" required>
									<small class="form-text text-danger help-block lead"></small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="label text-white" for="mensagem">Mensagem:</label>
									<textarea class="form-control" id="mensagem" name="mensagem"
										placeholder="Digite sua mensagem aqui *" required></textarea>
									<small class="form-text text-danger help-block lead"></small>
								</div>
							</div>
							<div class="col">
								<div class="clearfix"></div>
							</div>
							<div class="col-lg-12 text-center">
								<div id="success">
									<button class="btn btn-primary btn-xl text-uppercase"
										id="sendMessageButton" type="submit">Enviar mensagem</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div><br>
		<div class="container text-white">
			Se preferir, <a href="tel:+554331780900" class="btn text-danger btn-primary">clique aqui</a> pra ligar para um de nossos atendentes, direto no fone (43) 3178-0900, ou ainda <a href="https://api.whatsapp.com/send?phone=554331780900" class="btn text-danger btn-primary" target="_blank">clique aqui</a> para enviar uma mensagem em nosso whatsapp.
		</div>
	</section>