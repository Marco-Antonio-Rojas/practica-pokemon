<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Descubre Pokemons</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<meta name="viewport" content="width=device-width,initial-scale_1.0">
</head>
<body>
	<div class="buscador">
		<div class="buscador-encabezado">
			<div class="buscador__titulo">
				<h1>Descubre pokemons</h1>
			</div>
			<div class="buscador__boton">
				<input type="text" class="buscador__input-responsive" placeholder="Buscar">
				<img src="img/buscar.png" class="btn-buscar-responsive">
				<img src="img/buscar.png" class="btn-buscar">
			</div>
			<div class="buscador__boton">
				<img src="img/menu.png" class="btn-menu">
			</div>
		</div>
		<div class="buscador__div">
			<input type="text" class="buscador__input"placeholder="Buscar">
			<img src="img/buscar.png" class="btn-buscar__busqueda">
			<div class="btn-cerrar">
				<img src="img/cerrar.png" class="cerrar">
			</div>
		</div>
		<nav class="buscador__menu">
			<ul>
				<li><img src="img/cerrar.png" class="menu-cerrar"></li>
				<a href="index.php"><li>Inicio</li></a>
				<a href="todos.php"><li>Todos los pokemons</li></a>
				<?php
            		if (!empty($_SESSION['active'])) {
            	?>
				<a href="mis-pokemons.php"><li>Mis pokemons</li></a>
				<li><?php echo $_SESSION['nombre']; ?></li>
				<?php
            		}else{
            	?>
            	<a href="inicio-sesion.php"><li>Iniciar Sesion</li></a>
				<a href="registrarse.php"><li>Registrarse</li></a>
				<?php
            		}
            	?>
			</ul>
		</nav>
	</div>
	<div class="caja-pokemons"></div>
	<footer>
		<h3>Realizado por:</h3>
		<p>Marco Antonio Rojas Millan</p>
		<p>Con la API PokeAPI</p>
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<script type="text/javascript" src="js/acciones.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
</body>
</html>