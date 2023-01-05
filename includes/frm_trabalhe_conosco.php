<?php // Seção formulário de contato da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }
?>
	<section id="contact" class="contact bg-dark">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg text-center">
					<h2 class="text-uppercase section-heading">FORMULÁRIO - TRABALHE CONOSCO</h2>
					<h3 class="section-subheading text-muted text-primary">Preencha os dados do(a) candidato(a) e faça parte do nosso time que está sempre em crescimento! Juntos somos mais fortes!</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-lg">
					<form action="enviar_email.php" method="post" id="frm_trabalhe_conosco" name="frm_trabalhe_conosco" enctype="multipart/form-data" novalidate>
						<input type="hidden" id="enviarFormulario" name="enviarFormulario" value="enviar">
						<input type="hidden" id="assunto" name="assunto" value="Formulário Trabalhe Conosco do site www.safbompastor.com.br">
						<input type="hidden" id="para" name="para" value="contato@safbompastor.com.br">
						<div class="form-row">
							<div class="col col-md-6">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="chk_cliente" name="chk_cliente">
									<label class="form-check-label text-white" for="chk_cliente">Sou cliente SAF</label>
								</div>
								<div class="form-group">
									<label class="label text-white" for="remetenteNome">Nome Completo:</label>
									<input class="form-control" type="text" id="remetenteNome" name="remetenteNome"
										placeholder="Digite seu nome completo aqui *" required>
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
								<div class="form-group">
									<label class="label text-white" for="cargo_pretendido">Cargo pretendido:</label>
									<input class="form-control" type="text" id="cargo_pretendido" name="cargo_pretendido"
										placeholder="Digite o nome do cargo pretendido aqui *" required>
									<small class="form-text text-danger help-block lead"></small>
								</div>
								<div class="form-group">
									<label class="label text-white" for="pretensao_salarial">Pretensão salarial:</label>
									<input class="form-control" type="text" id="pretensao_salarial" name="pretensao_salarial"
										placeholder="Digite o valor da pretensão salarial aqui *" required>
									<small class="form-text text-danger help-block lead"></small>
								</div>
								<div class="form-group">
									<label class="label text-white" for="cidade_pretendida">Em qual Cidade/Estado quer trabalhar:</label>
									<input class="form-control" type="text" id="cidade_pretendida" name="cidade_pretendida"
										placeholder="Digite o nome da Cidade/Estado pretendida aqui *" required>
									<small class="form-text text-danger help-block lead"></small>
								</div>
								<label class="label text-white" for="div_periodo">Disponibilidade de período:</label>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="chk_disponibilidade_total" name="chk_disponibilidade_total">
									<label class="form-check-label text-white" for="chk_disponibilidade_total">Total!</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="chk_disponibilidade_manha" name="chk_disponibilidade_manha">
									<label class="form-check-label text-white" for="chk_disponibilidade_manha">Manhã</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="chk_disponibilidade_tarde" name="chk_disponibilidade_tarde">
									<label class="form-check-label text-white" for="chk_disponibilidade_tarde">Tarde</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="chk_disponibilidade_noite" name="chk_disponibilidade_noite">
									<label class="form-check-label text-white" for="chk_disponibilidade_noite">Noite</label>
								</div>
								<div class="form-group">
									<label class="form-control-label text-white" for="anexo">Enviar currículo em arquivo</label>
									<input class="form-control-file" type="file" id="anexo" name="anexo">
								</div>
							</div>
							<div class="col-md-6">
								<label class="label text-white" for="mensagem">Observações:</label>
								<div class="form-group">
									<textarea class="form-control" id="mensagem" name="mensagem"
										placeholder="Digite alguma observação aqui *"></textarea>
									<small class="form-text text-danger help-block lead"></small>
								</div>
							</div>
							<!--div class="col">
								<div class="clearfix"></div>
							</div-->
							<div class="col-lg-12 text-center" style="padding: 10px;">
								<div id="success"><button class="btn btn-primary btn-xl text-uppercase"
										id="sendMessageButton" name="sendMessageButton" type="submit">Quero trabalhar!</button></div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>