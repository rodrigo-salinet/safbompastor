<?php // Seção javascript do cabeçalho da página
if (!isset($index_ok)) { header('Location: ' . $_SERVER['SERVER_NAME']); }
?>
		<script type="text/javascript" language="javascript">
			function nav_topo() {
				var obj_mainNav = document.getElementById("mainNav");
				if (document.body.scrollTop > obj_mainNav.scrollTop || document.documentElement.scrollTop > obj_mainNav.scrollTop) {
					obj_mainNav.classList.add("fixed-top");
				} else {
					obj_mainNav.classList.remove("fixed-top");
				}
			}
		</script>