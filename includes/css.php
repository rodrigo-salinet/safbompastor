<?php // Seção CSS e estilos da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }
?>
		<link rel="icon" href="assets/img/saf.png?h=<?php echo $hash_aleatorio; ?>" type="image/png">
		<link rel="shortcut icon" href="favicon.ico?h=<?php echo $hash_aleatorio; ?>" type="image/x-icon">
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=<?php echo $hash_aleatorio; ?>">
		<link rel="manifest" href="manifest.json?h=<?php echo $hash_aleatorio; ?>">

		<!--link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700"-->
		<link rel="stylesheet" href="assets/css/montserrat.css?h=<?php echo $hash_aleatorio; ?>">

		<!--link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script"-->
		<link rel="stylesheet" href="assets/css/kaushanscript.css?h=<?php echo $hash_aleatorio; ?>">

		<!--link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic"-->
		<link rel="stylesheet" href="assets/css/droidserif.css?h=<?php echo $hash_aleatorio; ?>">

		<!--link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700"-->
		<link rel="stylesheet" href="assets/css/robotoslab.css?h=<?php echo $hash_aleatorio; ?>">

		<link rel="stylesheet" href="assets/fonts/font-awesome.min.css?h=<?php echo $hash_aleatorio; ?>">
		<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"-->
		<link rel="stylesheet" href="assets/css/smoothproducts.css?h=<?php echo $hash_aleatorio; ?>">

		<link rel="stylesheet" href="assets/css/cookie-banner.css">

		<!-- script do ícone flutuante do whatsapp -->
		<style>
			.lnk_wpp {
				position: fixed;
				width: 70px;
				height: 70px;
				right: 0px;
				bottom: 100px;
				background-color: #25d366;
				color :#FFF;
				border-radius: 70px;
				text-align: center;
				/*box-shadow: 2px 2px 3px #999;*/
				z-index: 999;
				font-size: 45px;
			}
			.btn_wpp {
				/*margin: 0px;*/
			}
		</style>

		<!-- estilos da seção mapa do site -->
		<style>
			.mapa_site {
				text-align: left;
				background-color: transparent;
				color: #0f2156;
				border: 0;
			}

			.lnk_mapa_site {
				color: #0f2156;
			}

			.tit_mapa_site {
				background-image:url('assets/img/barra.png');
				background-repeat: no-repeat;
				background-position: center;
				vertical-align: middle;
			}
		</style>

		<!-- estilos ddo botão voltar ao topo -->
		<style>
			.lnk_top {
				position:fixed;
				width:60px;
				height:60px;
				right:0px;
				bottom:30px;
				color:#000;
				text-align:center;
				font-size:30px;
				z-index:998;
			}
			.btn_top {
				margin-top:0px;
			}
		</style>

		<!-- estilos gerais das tags -->
		<style>
			/* recuo das páginas de texto */
			.recuo {
				text-indent: 2em;
				font-size: 2.5vw;
			}
			
			/* efeito botão PLANOS chacoalhando */
			.tremulo {
				animation: shake 0.82s cubic-bezier(.36,.07,.19,.97) both infinite;
				transform: translate3d(0, 0, 0);
				backface-visibility: hidden;
				perspective: 1000px;
			}
			@keyframes shake {
				10%, 90% {
					transform: translate3d(-1px, 0, 0);
				}

				20%, 80% {
					transform: translate3d(2px, 0, 0);
				}

				30%, 50%, 70% {
					transform: translate3d(-4px, 0, 0);
				}

				40%, 60% {
					transform: translate3d(4px, 0, 0);
				}
			}
			
			/* Efeito Flashing da logo */
			.img_logo figure:hover img {
				opacity: 1;
				-webkit-animation: flash 1.5s;
				animation: flash 1.5s;
			}
			@-webkit-keyframes flash {
				0% {
					opacity: .4;
				}
				100% {
					opacity: 1;
				}
			}
			@keyframes flash {
				0% {
					opacity: .4;
				}
				100% {
					opacity: 1;
				}
			}

			/* Efeito zoom nos banners */
			/*
			inspired from http://codepen.io/Rowno/pen/Afykb
			& https://jsfiddle.net/q0rgL8ws/
			*/
			.carousel-fade .carousel-inner .carousel-item a {
			  opacity: 0;
			  transition-property: opacity;
				overflow:hidden;
			}
			.carousel-item.active a img {
				transition: transform 5000ms linear 0s;
				/* This should be based on your carousel setting. For bs, it should be 5second*/
				transform: scale(1.15, 1.15);
			}
			.carousel-fade .carousel-inner .active a {
			  opacity: 1;
			}

			.carousel-fade .carousel-inner .active.left a,
			.carousel-fade .carousel-inner .active.right a {
			  /*left: 0;*/
			  opacity: 0;
			  z-index: 1;
			}

			.carousel-fade .carousel-inner .next.left a,
			.carousel-fade .carousel-inner .prev.right a {
			  opacity: 1;
			}

			.carousel-fade .carousel-control {
			  z-index: 2;
			}

			/*
			WHAT IS NEW IN 3.3: "Added transforms to improve carousel performance in modern browsers."
			now override the 3.3 new styles for modern browsers & apply opacity
			*/
			@media all and (transform-3d), (-webkit-transform-3d) {
				.carousel-fade .carousel-inner > .carousel-item.next a,
				.carousel-fade .carousel-inner > .carousel-item.active.right a {
					opacity: 0;
					-webkit-transform: translate3d(0, 0, 0);
					transform: translate3d(0, 0, 0);
				}
				.carousel-fade .carousel-inner > .carousel-item.prev a,
				.carousel-fade .carousel-inner > .carousel-item.active.left a {
					opacity: 0;
					-webkit-transform: translate3d(0, 0, 0);
					transform: translate3d(0, 0, 0);
				}
				.carousel-fade .carousel-inner > .carousel-item.next.left a,
				.carousel-fade .carousel-inner > .carousel-item.prev.right a,
				.carousel-fade .carousel-inner > .carousel-item.active a {
					opacity: 1;
					-webkit-transform: translate3d(0, 0, 0);
					transform: translate3d(0, 0, 0);
				}
			}

		</style>
