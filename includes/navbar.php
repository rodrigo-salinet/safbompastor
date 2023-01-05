<?php // Seção do elemento NavBar da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }
?>
	<nav class="navbar navbar-expand-xl" id="mainNav" style="background-color: #0F2156; padding: 0px;">
		<div class="d-flex-fluid w-100">
			<div class="p-0 flex-row">
				<div class="container-fluid">
					<a href="index.php">
						<div class="img_logo">
							<figure><img class="img" src="assets/img/saf.png"></figure>
						</div>
					</a>
					<div class="d-flex align-self-center">
						<div class="d-flex flex-column">
							<div class="p-0 m-0" style="font-size: 40px;">
								<center>
									<a href="https://api.whatsapp.com/send?phone=554331780900" target="_blank"><i class="fa fa-whatsapp"></i></a>
									<a href="tel:+554331780900"><i class="fa fa-phone"></i></a>
								</center>
							</div>
							<div class="p-1">
								<span class="text-primary" style="white-space: nowrap;">(43) 3178-0900</span>
							</div>
						</div>
					</div>
					<div class="tremulo">
						<a href="escolha_planos.php" class="btn btn-primary btn-sm text-uppercase text-danger">PLANOS</a>
					</div>
					<button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler bg-transparent btn btn-dark btn-xl" id="btn_nav">
						<i class="fa fa-bars"></i>
					</button>
					<div class="collapse navbar-collapse" id="navbarResponsive">
						<ul class="nav navbar-nav ml-auto">
<?php

$str_sql_navbars = "SELECT * FROM navbars;";

if ($sql_navbars = mysqli_query($conexao,$str_sql_navbars)) {
while ($linha_navbars = mysqli_fetch_assoc($sql_navbars)) {
	$ativo_navbars = $linha_navbars['ATIVO'];
	if ($ativo_navbars == "S") {
		$id_navbars = $linha_navbars['ID'];
		$nome_navbars = $linha_navbars['NOME'];
		$link_navbars = $linha_navbars['LINK'];
		$titulo_navbars = $linha_navbars['TITULO'];

?>
							<li id="nav<?php echo $id_navbars; ?>" class="nav-item" role="presentation"><a class="nav-link text-center btn btn-sm btn-dark border border-light m-1" href="<?php echo $link_navbars; ?>" title="<?php echo $titulo_navbars; ?>"><?php echo $nome_navbars; ?></a></li>
<?php

	}
}
mysqli_data_seek($sql_navbars,0);
}
?>
						</ul>
						<ul class="nav navbar-nav ml-auto">
							<li class="nav-item d-flex">
								<a class="nav-link ml-auto" href="#searchForm" data-target="#searchForm" data-toggle="collapse">
									<i class="fa fa-search"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="p-0 flex-row">
				<form class="navbar-form navbar-right" action="pesquisar.php" method="get" id="frm_pesquisa" name="frm_pesquisa">
					<div class="d-flex-fluid justify-content-end bg-dark">
						<div class="collapse fade" id="searchForm">
							<div class="d-flex">
								<div class="p-1 align-self-center w-100">
									<input id="search" name="search" type="search" class="form-control" placeholder="Digite aqui para pesquisar">
								</div>
								<div class="p-1 align-self-center">
									<button type="submit" class="btn btn-primary text-uppercase">Pesquisar</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</nav>