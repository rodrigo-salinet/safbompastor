<?php // Carregamento de funções do sistema;
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }

function separador_argumentos() {
	$arg_list = func_get_args();
	if (count($arg_list) > 0) {
		$texto = strval($arg_list[0]);
		$chrInicial = '';
		$chrFinal = '';
		if (isset($arg_list[1]) == true) {
			$chrInicial = strval($arg_list[1]);
		}
		if (isset($arg_list[2]) == true) {
			$chrFinal = strval($arg_list[2]);
		}
		$achouInicial = false;
		$posInicial = 0;
		$divisoes = array();
		$num_valor = 0;
		$resposta = $texto;
		for ($i = 0; $i < strlen($texto); $i++) {
			if ($texto{$i} == $chrInicial) {
				$posInicial = $i;
				$achouInicial = true;
			}
			if ($texto{$i} == $chrFinal) {
				if ($achouInicial == true) {
					$divisoes[$num_valor] = substr($texto,($posInicial + 1),($i - ($posInicial + 1)));
					$num_valor++;
					$achouInicial = false;
				}
			}
		}
		if (count($divisoes) > 0) {
			$resposta = $divisoes;
		}
		return $resposta;
	}
}
function remove_zero_esq(/*$valor*/) {
	$str = '';
	if (count(func_get_args()) > 0) {
		$arg_list = func_get_args();
		if (isset($arg_list[0]) == true) {
			$str = strval(func_get_arg(0));
			for ($n = 0; $n < strlen($str); $n++) {
				if ($str{0} == '0') {
					$str = substr($str,1);
				}
			}
		}
	}
	return $str;
}
function porcentagem(/*$valor,$fator,$tipo*/) {
	$calculo = '';
	if (count($argumentos) > 0) {
		$arg_list = func_get_args();
		if (isset($arg_list[0]) == true && isset($arg_list[1]) == true) {
			$valor = floatval(remove_zero_esq(trim(func_get_arg(0))));
			$fator = floatval(remove_zero_esq(trim(func_get_arg(1))));
			if (is_numeric($valor) == false) {
				$valor = 0;
			}
			if (is_numeric($fator) == false) {
				$fator = 0;
			}
			$calculo = floatval(($valor / 100) * $fator);
			if (isset($arg_list[2]) == true) {
				$tipo = strval(trim(func_get_arg(2)));
				if (strlen($tipo) > 0) {
					for ($n = 0; $n < strlen($tipo); $n++) {
						if ($tipo{$n} == '+') {
							$calculo = ($valor + $calculo);
							break;
						}
						if ($tipo{$n} == '-') {
							$calculo = ($valor - $calculo);
							break;
						}
						if ($tipo{$n} == '*') {
							$calculo = ($valor * $calculo);
							break;
						}
						if ($tipo{$n} == '/') {
							$calculo = ($valor / $calculo);
							break;
						}
					}
				}
			}
		}
	}
	return $calculo;
}
function remove_caracteres(/*$texto,$caracteres*/) {
	$argumentos = func_get_args();
	$txt_resposta = '';
	if (count($argumentos) > 0) {
		$arg_list = func_get_args();
		if (isset($arg_list[0]) == true && isset($arg_list[1]) == true) {
			$texto = strval(func_get_arg(0));
			$caracteres = strval(func_get_arg(1));
			for ($n = 0; $n < strlen($texto); $n++) {
				$achou = false;
				for ($j = 0; $j < strlen($caracteres); $j++) {
					if ($texto{$n} == $caracteres{$j}) {
						$achou = true;
					}
				}
				if ($achou == false) {
					$txt_resposta .= strval($texto{$n});
				}
			}
		}
	}
	return $txt_resposta;
}
function remove_letras(/*$texto*/) {
	$txt_resposta = '';
	if (count(func_get_args()) > 0) {
		$arg_list = func_get_args();
		if (isset($arg_list[0]) == true) {
			$texto = strval(func_get_arg(0));
			for ($n = 0; $n < strlen($texto); $n++) {
				if (is_numeric($texto{$n}) == true) {
					$txt_resposta .= strval($texto{$n});
				}
			}
		}
	}
	return $txt_resposta;
}
function remove_numeros(/*$texto*/) {
	$txt_resposta = '';
	if (count(func_get_args()) > 0) {
		$arg_list = func_get_args();
		if (isset($arg_list[0]) == true) {
			$texto = strval(func_get_arg(0));
			for ($n = 0; $n < strlen($texto); $n++) {
				if (is_numeric($texto{$n}) == false) {
					$txt_resposta .= strval($texto{$n});
				}
			}
		}
	}
	return $txt_resposta;
}
function separador(/*$valor,$tipo,$excecoes*/) {
	$divisoes = '';
	if (count(func_get_args()) > 0) {
		$arg_list = func_get_args();
		$valor = '';
		if (isset($arg_list[0]) == true) {
			$valor = strval(func_get_arg(0));
			$numerico = true;
			if (isset($arg_list[1]) == true) {
				$tipo = func_get_arg(1);
				if (is_numeric($tipo) == false && strlen($tipo) > 0) {
					$numerico = false;
				}
			}
			$num_excecoes = 0;
			if (isset($arg_list[2]) == true) {
				$excecoes = strval(func_get_arg(2));
				$num_excecoes = intval(strlen($excecoes));
			}
			$num_divisao = 0;
			$divisoes = array();
			for ($n = 0; $n < strlen($valor); $n++) {
				$enc_excecao = false;
				$enc_prox_excecao = false;
				if ($num_excecoes > 0) {
					for ($i = 0; $i < $num_excecoes; $i++) {
						if ($valor{$n} == $excecoes{$i}) {
							$enc_excecao = true;
						}
						if (isset($valor{($n + 1)}) == true) {
							if ($valor{($n + 1)} == $excecoes{$i}) {
								$enc_prox_excecao = true;
							}
						}
					}
				}
				if (is_numeric($valor{$n}) == $numerico || $enc_excecao == true) {
					if (isset($divisoes[$num_divisao]) == false) {
						$divisoes[$num_divisao] = '';
					}
					$divisoes[$num_divisao] .= strval($valor{$n});
					if (isset($valor{($n + 1)}) == true) {
						$prox_chr = $valor{($n + 1)};
						if (is_numeric($prox_chr) != $numerico && $enc_prox_excecao == false) {
							$num_divisao += 1;
						}
					}
				}
			}
		}
	}
	return $divisoes;
}
function delta(/*$fatores,$valor*/) {
	$delta = '';
	if (count(func_get_args()) > 0) {
		$arg_list = func_get_args();
		$fatores = '';
		if (isset($arg_list[0]) == true) {
			$fatores = func_get_arg(0);
		}
		$valor = '';
		if (isset($arg_list[1]) == true) {
			$valor = func_get_arg(1);
		}
		$fatores = separador($fatores,'','.');
		$valor_total = floatval($valor);
		$valor_total_desconto = 0;
		for ($i = 0; $i < count($fatores); $i++) {
			if ($valor_total_desconto == 0) {
				$valor_total_desconto = $valor_total - (($valor_total / 100) * floatval($fatores[$i]));
			} else {
				$valor_total_desconto -= (($valor_total_desconto / 100) * floatval($fatores[$i]));
			}
		}
		$dif_vt_vtd = $valor_total - $valor_total_desconto;
		$delta = $dif_vt_vtd / ($valor_total / 100);
	}
	return strval($delta);
}
function soma(/*$valor1,$valor2*/) {
	$str_temp = '';
	if (count(func_get_args()) > 0) {
		$arg_list = func_get_args();
		$valor1 = '';
		if (isset($arg_list[0]) == true) {
			$valor1 = strval(func_get_arg(0));
		}
		$valor2 = '';
		if (isset($arg_list[1]) == true) {
			$valor2 = strval(func_get_arg(1));
		}
		if ($valor1 != '' && $valor2 != '') {
			$val_1 = implode('',separador($valor1));
			$val_1 = remove_zero_esq($val_1);
			$val_2 = implode('',separador($valor2));
			$val_2 = remove_zero_esq($val_2);
			$resultado = 0;
			$num_chr_val_1 = intval(strlen($val_1));
			$num_chr_val_2 = intval(strlen($val_2));
			$num_caracteres = 0;
			$str_temp = '';
			if ($num_chr_val_1 < $num_chr_val_2) {
				$num_caracteres = $num_chr_val_2;
			} else {
				$num_caracteres = $num_chr_val_1;
			}
			$sobra = 0;
			for ($n = 0; $n < $num_caracteres; $n++) {
				$valor1_temp = 0;
				if (isset($val_1{strlen($val_1) - ($n + 1)})) {
					$valor1_temp = intval($val_1{strlen($val_1) - ($n + 1)});
				}
				$valor2_temp = 0;
				if (isset($val_2{strlen($val_2) - ($n + 1)})) {
					$valor2_temp = intval($val_2{strlen($val_2) - ($n + 1)});
				}
				$resultado = (($valor1_temp + $valor2_temp) + $sobra);
				if (is_nan($resultado) == true) {
					if (is_nan($valor1_temp) == false) {
						$resultado = ($valor1_temp + $sobra);
					}
					if (is_nan($valor2_temp) == false) {
						$resultado = ($valor2_temp + $sobra);
					}
				}
				$tmp = strval($resultado);
				if (strlen($tmp) > 1) {
					$str_temp = strval($tmp{1}) . strval($str_temp);
					$sobra = intval($tmp{0});
				} else {
					$str_temp = strval($tmp{0}) . strval($str_temp);
					$sobra = 0;
				}
			}
		}
	}
	return $str_temp;
}
function formatar_cep(/*$str_cep*/){
	$arg_list = func_get_args();
	$str_cep = '';
	if (count($arg_list) > 0) {
		$str_cep = remove_letras($arg_list[0]);
		$str_cep = str_pad($str_cep,8,' ',STR_PAD_LEFT);
		$str_cep = substr($str_cep,0,5) . '-' . substr($str_cep,5,3);
	}
	return $str_cep;
}
function formatar_cnpj(/*$str_cnpj*/) {
	$arg_list = func_get_args();
	$str_cnpj = '';
	if (count($arg_list) > 0) {
		$str_cnpj = remove_letras(strval($arg_list[0]));
		$str_cnpj = str_pad($str_cnpj,14,'0',STR_PAD_LEFT);
		$str_cnpj = substr($str_cnpj,0,2) . '.' . substr($str_cnpj,2,3) . '.' . substr($str_cnpj,5,3) . '/' . substr($str_cnpj,8,4) . '-' . substr($str_cnpj,12,2);
	}
	return $str_cnpj;
}
function formatar_cpf(/*$str_cnpj*/) {
	$arg_list = func_get_args();
	$str_cpf = '';
	if (count($arg_list) > 0) {
		$str_cpf = remove_letras(strval($arg_list[0]));
		$str_cpf = str_pad($str_cpf,11,'0',STR_PAD_LEFT);
		$str_cpf = substr($str_cpf,0,3) . '.' . substr($str_cpf,3,3) . '.' . substr($str_cpf,6,3) . '-' . substr($str_cpf,8,2);
	}
	return $str_cpf;
}
function formatar_telefone(/*$str_fone*/) {
	$arg_list = func_get_args();
	$str_fone = '';
	if (count($arg_list) > 0) {
		$str_fone = remove_letras(strval($arg_list[0]));
		if (strlen($str_fone) <= 8) {
			$str_fone = str_pad($str_fone,10,' ',STR_PAD_LEFT);
		}
		if (strlen($str_fone) == 10) {
			$str_fone = '(' . substr($str_fone,0,2) . ')' . substr($str_fone,2,4) . '-' . substr($str_fone,6,4);
		} else {
			$str_fone = '(' . substr($str_fone,0,2) . ')' . substr($str_fone,2,3) . '-' . substr($str_fone,5,4);
		}
	}
	return $str_fone;
}
function nomes_colunas_tabela(/*tabela*/) {
	$arg_list = func_get_args();
	if (count($arg_list) > 0) {
		$tabela = strval(func_get_arg(0));
		if (isset($arg_list[1]) == true) {
			$con_atual = $arg_list[1];
			$cols_tabela = mysql_list_fields($GLOBALS['db'],$tabela,$con_atual);
		} else {
			$cols_tabela = mysql_list_fields($GLOBALS['db'],$tabela);
		}
		$nomes = array();
		for ($i = 0; $i < @mysql_num_fields($cols_tabela); $i++) {
			$nomes[$i] = mysql_field_name($cols_tabela,$i);
		}
		return $nomes;
	}
}
function ver_arquivos() {
	$arg_list = func_get_args();
	if (count($arg_list) > 0) {
		$dir_base_temp = str_replace(basename($_SERVER['PHP_SELF']),"",$_SERVER['PHP_SELF']);
		$dir_busca = $arg_list[0];
		$arquivos = array();
		if ($diretorio = opendir(dir_base_temp . $dir_busca)) {
			$n_arq = 0;
			while (false !== ($conteudo = readdir($handle))) {
				if ($conteudo != '.' && $conteudo != '..') {
					if (is_file(dir_base_temp . $dir_busca . $sep_diretorio . $conteudo) == true) {
						$arquivos[$n_arq] = $conteudo;
						$n_arq++;
					}
				}
			}
		}
		closedir($diretorio);
		if (count($arquivos) > 0) {
			return $arquivos;
		}
	}
}
function ver_diretorios() {
	$arg_list = func_get_args();
	if (count($arg_list) > 0) {
		$dir_base_temp = str_replace(basename($_SERVER['PHP_SELF']),"",$_SERVER['PHP_SELF']);
		$dir_busca = $arg_list[0];
		$diretorios = array();
		if ($diretorio = opendir(dir_base_temp . $dir_busca)) {
			$n_dir = 0;
			while (false !== ($conteudo = readdir($handle))) {
				if ($conteudo != '.' && $conteudo != '..') {
					if (is_dir(dir_base_temp . $dir_busca . $sep_diretorio . $conteudo) == true) {
						$diretorios[$n_arq] = $conteudo;
						$n_dir++;
					}
				}
			}
		}
		closedir($diretorio);
		if (count($diretorios) > 0) {
			return $diretorios;
		}
	}
}

function banner_liberado($ano_inicio,$mes_inicio,$dia_inicio,$ano,$mes,$dia) {
	$liberado = "N";
	if ($ano >= $ano_inicio) {
		if ($mes >= $mes_inicio) {
			if ($dia >= $dia_inicio) {
				$liberado = "S";
			}
		}
	}
	return $liberado;
}

function banner_vencido($ano_fim,$mes_fim,$dia_fim,$ano,$mes,$dia) {
	$vencido = "N";
	if ($ano >= $ano_fim) {
		if ($mes >= $mes_fim) {
			if ($dia > $dia_fim) {
				$vencido = "S";
			}
		}
	}
	return $vencido;
}

?>
