<?php // Processador log_ da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }

$ip_atual = $_SERVER["REMOTE_ADDR"];
$dia_atual = date("d");
$mes_atual = date("m");
$ano_atual = date("Y");
$hora_atual = date("H");
$minuto_atual = date("i");
$segundo_atual = date("s");

$log_obs = 'NULL';
if (isset($obs_log)) {
	if ($obs_log != '') {
		$log_obs = "'" . $obs_log . "'";
	}
}

$str_sql_log_ = "INSERT INTO `log_` (`ID`, `ID_PAGINA`, `IP`, `DIA`, `MES`, `ANO`, `HORA`, `MINUTO`, `SEGUNDO`,`HASH`,`OBS`) VALUES (NULL, '$id_pagina_atual', '$ip_atual', '$dia_atual', '$mes_atual', '$ano_atual', '$hora_atual', '$minuto_atual', '$segundo_atual', '$hash_aleatorio', $log_obs);";

$log_ok = "S";
if (!mysqli_query($conexao,$str_sql_log_)) {
	$log_ok = "N";
	$msg .= " | mysqlerr: " . mysqli_error($conexao) . ", no-log | ";
}

$id_log_ = '';
if ($log_ok == "S") {
	$str_sql_ver_log_ = "SELECT * FROM log_ WHERE ID_PAGINA='$id_pagina_atual' AND IP='$ip_atual' AND DIA='$dia_atual' AND MES='$mes_atual' AND ANO='$ano_atual' AND HORA='$hora_atual' AND MINUTO='$minuto_atual' AND SEGUNDO='$segundo_atual' AND HASH='$hash_aleatorio';";
	$sql_ver_log_ = mysqli_query($conexao,$str_sql_ver_log_);

	if (mysqli_num_rows($sql_ver_log_) == 1) {
		mysqli_data_seek($sql_ver_log_,0);
		$linha_ver_log_ = mysqli_fetch_assoc($sql_ver_log_);
		$id_log_ = $linha_ver_log_['ID'];
	} elseif (mysqli_num_rows($sql_ver_log_) > 1) {
		$msg .= " | log duplicado | ";
	} elseif (mysqli_num_rows($sql_ver_log_) == 0) {
		$msg .= " | log inexistente | ";
	}
}

if (isset($_GET)) {
	foreach ($_GET as $get_var_key => $get_var_value) {
		if ($get_var_key != '' && $get_var_value != '') {
			$str_sql_get_var = "INSERT INTO `get_post_vars` (`ID`, `ID_PAGINA`, `TIPO`, `VARIAVEL`, `VALOR`,`ID_LOG_`) VALUES (NULL, '$id_pagina_atual', 'GET', '$get_var_key', '$get_var_value', '$id_log_')";
			if (!mysqli_query($conexao,$str_sql_get_var)) {
				$msg .= " | mysqlerr: " . mysqli_error($conexao) . ", no-getvar | ";
			}
		}
	}
}

if (isset($_POST)) {
	foreach ($_POST as $post_var_key => $post_var_value) {
		if ($post_var_key != '' && $post_var_value != '') {
			$str_sql_post_var = "INSERT INTO `get_post_vars` (`ID`, `ID_PAGINA`, `TIPO`, `VARIAVEL`, `VALOR`) VALUES (NULL, '$id_pagina_atual', 'POST', '$post_var_key', '$post_var_value', '$id_log_')";
			if (!mysqli_query($conexao,$str_sql_post_var)) {
				$msg .= " | mysqlerr: " . mysqli_error($conexao) . ", no-postvar | ";
			}
		}
	}
}
?>