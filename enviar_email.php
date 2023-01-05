<?php // Processador de envio de emails do site
//var_dump($_FILES); phpinfo(); exit();

// variável necessária para executar qualquer script;
$index_ok = "ok";

// Seção de inicialização de script da página
require_once('includes/script_inicio.php');

// Seção de conexão com o banco de dados
require_once('includes/conecta.php');

if (isset($_POST['enviarFormulario'])){

	$email_suporte = "suporte@safbompastor.com.br";
	
	/****************** Do frm_contato.php ******************/
	
	$subject = $_POST['assunto'];
	$to = $_POST['para'];
	$nome = $_POST['remetenteNome'];
	$from = $_POST['remetenteEmail'];
	$fone = $_POST['tel'];
	$mensagem = $_POST['mensagem'];

	/****************** * ******************/

	/****************** Do frm_trabalhe_conosco.php ******************/
	
	$cargo_pretendido = "";
	if (isset($_POST['cargo_pretendido'])) {
		$cargo_pretendido = $_POST['cargo_pretendido'];
	}
	
	$pretensao_salarial = "";
	if (isset($_POST['pretensao_salarial'])) {
		$pretensao_salarial = $_POST['pretensao_salarial'];
	}

	$cidade_pretendida = "";
	if (isset($_POST['cidade_pretendida'])) {
		$cidade_pretendida = $_POST['cidade_pretendida'];
	}

	$chk_disponibilidade_total = "";
	if (isset($_POST['chk_disponibilidade_total'])) {
		$chk_disponibilidade_total = "Sim";
	}

	$chk_disponibilidade_manha = "";
	if (isset($_POST['chk_disponibilidade_manha'])) {
		$chk_disponibilidade_manha = "Sim";
	}

	$chk_disponibilidade_tarde = "";
	if (isset($_POST['$chk_disponibilidade_tarde'])) {
		$$chk_disponibilidade_tarde = "Sim";
	}

	$chk_disponibilidade_noite = "";
	if (isset($_POST['chk_disponibilidade_noite'])) {
		$chk_disponibilidade_noite = "Sim";
	}

	$anexo = "";
	if (isset($_POST['anexo'])) {
		$anexo = "Sim";
	}

	/****************** * ******************/

	/****************** Do frm_agendamento.php ******************/
	
	$cidade_atendimento = "";
	if (isset($_POST['cidade_atendimento'])) {
		$cidade_atendimento = $_POST['cidade_atendimento'];
	}

	$chk_cliente = "";
	if (isset($_POST['chk_cliente'])) {
		$chk_cliente = "Sim";
	}

	$nome_paciente = "";
	if (isset($_POST['nome_paciente'])) {
		$nome_paciente = $_POST['nome_paciente'];
	}

	$especialidade = "";
	if (isset($_POST['especialidade'])) {
		$especialidade = $_POST['especialidade'];
	}

	$nome_especialista = "";
	if (isset($_POST['nome_especialista'])) {
		$nome_especialista = $_POST['nome_especialista'];
	}

	$chk_periodo = "";
	if (isset($_POST['chk_periodo'])) {
		$chk_periodo = $_POST['chk_periodo'];
	}
	
	/****************** * ******************/

	$message = "";
	$message .= "<b>Assunto</b>: " . $subject . " <br/> \r\n";
	$message .= "<b>Nome</b>: " . $nome . " <br/> \r\n";
	$message .= "<b>Email</b>: " . $from . " <br/> \r\n";
	$message .= "<b>Fone</b>: " . $fone . " <br/> \r\n";

	// Do frm_trabalhe_conosco.php:
	
	if ($cargo_pretendido != '') {
		$message .= "<b>Cargo pretendido</b>: " . $cargo_pretendido . " <br/> \r\n";
	}

	if ($pretensao_salarial != '') {
		$message .= "<b>Pretensão salarial</b>: " . $pretensao_salarial . " <br/> \r\n";
	}

	if ($cidade_pretendida != '') {
		$message .= "<b>Cidade pretendida</b>: " . $cidade_pretendida . " <br/> \r\n";
	}

	if ($chk_disponibilidade_total != '') {
		$message .= "<b>Disponibilidade total</b>: " . $chk_disponibilidade_total . " <br/> \r\n";
	}

	if ($chk_disponibilidade_manha != '') {
		$message .= "<b>Disponibilidade manhã</b>: " . $chk_disponibilidade_manha . " <br/> \r\n";
	}

	if ($chk_disponibilidade_tarde != '') {
		$message .= "<b>Disponibilidade tarde</b>: " . $chk_disponibilidade_tarde . " <br/> \r\n";
	}

	if ($chk_disponibilidade_noite != '') {
		$message .= "<b>Disponibilidade noite</b>: " . $chk_disponibilidade_noite . " <br/> \r\n";
	}

	if ($anexo != '') {
		$message .= "<b>Currículo em anexo?</b>: " . $anexo . " <br/> \r\n";
	}

	/****************** * ******************/

	// Do frm_agendamento.php:
	
	if ($chk_cliente != '') {
		$message .= "<b>Cliente SAF?</b>: " . $chk_cliente . " <br/> \r\n";
	}

	if ($nome_paciente != '') {
		$message .= "<b>Nome paciente</b>: " . $nome_paciente . " <br/> \r\n";
	}

	if ($especialidade != '') {
		$message .= "<b>Especialidade</b>: " . $especialidade . " <br/> \r\n";
	}

	if ($nome_especialista != '') {
		$message .= "<b>Nome especialista</b>: " . $nome_especialista . " <br/> \r\n";
	}

	if ($cidade_atendimento != '') {
		$message .= "<b>Cidade/Estado</b>: " . $cidade_atendimento . " <br/> \r\n";
	}

	if ($chk_periodo != '') {
		$message .= "<b>Período</b>: " . $chk_periodo . " <br/> \r\n";
	}
	
	/****************** * ******************/

	$message .= "<br/><br/> \r\n";
	$message .= "<b>Mensagem</b>: <br/> " . wordwrap($mensagem, 69, "<br/> \r\n") . " <br/> \r\n";

	/*** INÍCIO - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/
	
	
	$enviaFormularioParaNome = 'Contato SAF Bom Pastor';
	
	$enviaFormularioParaEmail = $to;
	
	
	$caixaPostalServidorNome = 'SAF Bom Pastor | Formulário';
	
	$caixaPostalServidorEmail = 'contato@safbompastor.com.br';
	
	$caixaPostalServidorSenha = 'saf08007072030';
	
	
	/*** FIM - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/
	
	
	/* abaixo as variaveis principais, que devem conter em seu formulario*/
	
	
	$remetenteNome  = $_POST['remetenteNome'];
	
	$remetenteEmail = $_POST['remetenteEmail'];
	
	$assunto  = $_POST['assunto'];
	
	$mensagem = $message;
	
	
	$mensagemConcatenada = 'Formulário gerado pelo site www.safbompastor.com.br'.'<br/><br/>';
	
	//$mensagemConcatenada .= '-------------------------------<br/><br/>';
	
	//$mensagemConcatenada .= 'Nome: '.$remetenteNome.'<br/>';
	
	//$mensagemConcatenada .= 'E-mail: '.$remetenteEmail.'<br/>';
	
	//$mensagemConcatenada .= 'Assunto: '.$assunto.'<br/>';
	
	//$mensagemConcatenada .= '-------------------------------<br/><br/>';
	
	$mensagemConcatenada .= $mensagem.'<br/>';
	
	/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/
	
	
	require ('PHPMailer_5.2.4/class.phpmailer.php');
	
	$mail = new PHPMailer();
	
	$mail->IsSMTP();
	
	$mail->SMTPAuth  = true;
	
	$mail->Charset   = 'utf8_decode()';
	
	$mail->Host  = 'smtp.'.substr(strstr($caixaPostalServidorEmail, '@'), 1);
	
	$mail->Port  = '587';
	
	$mail->Username  = $caixaPostalServidorEmail;
	
	$mail->Password  = $caixaPostalServidorSenha;
	
	$mail->From  = $caixaPostalServidorEmail;
	
	$mail->FromName  = utf8_decode($caixaPostalServidorNome);
	
	$mail->IsHTML(true);
	
	$mail->Subject  = utf8_decode($assunto);
	
	$mail->Body  = utf8_decode($mensagemConcatenada);

	if (isset($_FILES['anexo']['tmp_name'])) {
		$mail->AddAttachment($_FILES['anexo']['tmp_name'],$_FILES['anexo']['name']);
	}

	$mail->AddAddress($enviaFormularioParaEmail,utf8_decode($enviaFormularioParaNome));
	
	$mail->AddBCC($email_suporte, 'Suporte | SAF Bom Pastor');
	
	if(!$mail->Send()){
	
		$mensagemRetorno = 'Sua mensagem não pôde ser enviada! Tente amanhã de novo por favor. Obrigado.';
		$obs_log = 'Erro ao enviar formulário: ' . print($mail->ErrorInfo);

	} else {
	
		$mensagemRetorno = 'Sua mensagem foi enviada e em breve será respondido(a). Obrigado.';

	}
	
} else {

	$mensagemRetorno = 'Ops! Algo de errado não está certo! Por favor, tente novamente amanhã. Obrigado.';

}

// Seção de log_ da página
require_once('includes/log_.php');

header('Location: https://www.safbompastor.com.br/index.php?msg=' . htmlspecialchars($mensagemRetorno));

?>