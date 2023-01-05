<?php // Seção formulário de contato da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }
?>
	<section id="contact" class="contact bg-dark">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg text-center">
					<h2 class="text-uppercase section-heading">Realize aqui seu cadastro</h2>
					<h3 class="section-subheading text-muted text-primary">Preencha o formulário abaixo e cadastre-se para concluir a aqui sição de seu plano.</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-lg">
					<form action="enviar_email.php" method="post" id="frm_agendamento" name="frm_agendamento" novalidate>
						<input type="hidden" id="enviarFormulario" name="enviarFormulario" value="enviar">
						<input type="hidden" id="assunto" name="assunto" value="Formulário de agendamento online do site www.safbompastor.com.br">
						<input type="hidden" id="para" name="para" value="atendimento@safbompastor.com.br">
						<div class="form-row">
							<div class="col col-md-6">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="chk_cliente" name="chk_cliente">
									<label class="form-check-label text-white" for="chk_cliente">Sou cliente SAF</label>
								</div>
								<div class="form-group">
									<label class="label text-white" for="remetenteNome">Nome Completo do(a) solicitante:</label>
									<input class="form-control" type="text" id="remetenteNome" name="remetenteNome"
										placeholder="Digite seu nome completo aqui *" required>
									<small class="form-text text-danger flex-grow-1 help-block lead"></small>
								</div>
								<div class="form-group">
									<label class="label text-white" for="remetenteEmail">Email do(a) solicitante:</label>
									<input class="form-control" type="email" id="remetenteEmail" name="remetenteEmail"
										placeholder="Digite seu Email aqui *" required>
									<small class="form-text text-danger help-block lead"></small>
								</div>
								<div class="form-group">
									<label class="label text-white" for="tel">Fone/Whatsapp do(a) solicitante:</label>
									<input class="form-control" type="tel" id="tel" name="tel"
										placeholder="Digite seu telefone/whatsapp aqui *" required>
									<small class="form-text text-danger help-block lead"></small>
								</div>
								<div class="form-group">
									<label class="label text-white" for="nome_paciente">Nome completo do(a) paciente:</label>
									<input class="form-control" type="text" id="nome_paciente" name="nome_paciente"
										placeholder="Digite o nome completo do(a) paciente aqui *" required>
									<small class="form-text text-danger help-block lead"></small>
								</div>
								<div class="form-group">
									<label class="label text-white" for="especialidade">Especialidade:</label>
									<input class="form-control" type="text" id="especialidade" name="especialidade"
										placeholder="Digite a especialidade médica ou serviço aqui *" required>
									<small class="form-text text-danger help-block lead"></small>
								</div>
								<div class="form-group">
									<label class="label text-white" for="nome_especialista">Nome do(a) Especialista:</label>
									<input class="form-control" type="text" id="nome_especialista" name="nome_especialista"
										placeholder="Digite o nome do(a) especialista aqui *" required>
									<small class="form-text text-danger help-block lead"></small>
								</div>
								<div class="form-group">
									<label class="label text-white" for="cidade_atendimento">Cidade/Estado do atendimento:</label>
									<input class="form-control" type="text" id="cidade_atendimento" name="cidade_atendimento"
										placeholder="Digite a Cidade/Estado para atendimento aqui *" required>
									<small class="form-text text-danger help-block lead"></small>
								</div>
								<label class="label text-white" for="div_periodo">Selecione o período:</label>
								<div class="form-check form-check-inline" id="div_periodo">
									<input class="form-check-input" type="radio" id="chk_qualquer" name="chk_periodo" value="Qualquer" checked>
									<label class="form-check-label text-white" for="chk_qualquer">Qualquer</label>
								</div>
								<div class="form-check form-check-inline" id="div_periodo">
									<input class="form-check-input" type="radio" id="chk_manha" name="chk_periodo" value="Manhã">
									<label class="form-check-label text-white" for="chk_manha">Manhã</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" id="chk_tarde" name="chk_periodo" value="Tarde">
									<label class="form-check-label text-white" for="chk_tarde">Tarde</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" id="chk_noite" name="chk_periodo" value="Noite">
									<label class="form-check-label text-white" for="chk_noite">Noite</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="chk_quero_desconto" name="chk_quero_desconto">
									<label class="form-check-label text-white" for="chk_quero_desconto">Quero DESCONTO!</label>
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
							<div class="col">
								<div class="clearfix"></div>
							</div>
							<div class="col-lg-12 text-center" style="padding: 10px;">
								<div id="success"><button class="btn btn-primary btn-xl text-uppercase"
										id="sendMessageButton" type="submit">Agendar</button></div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>