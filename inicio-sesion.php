<?php 
    $con=mysqli_connect("localhost","id11811536_root","Hola1234","id11811536_prueba");
	$alerta='';
	session_start();
	if (!empty($_SESSION['active'])) {
		header('location: index.php');
	}else{
		if (!empty($_POST)) {
			if (empty($_POST['usuario'])||empty($_POST['clave'])) {
				$alerta='Ingrese su usuario y contraseña';
			}else{
				$user=mysqli_real_escape_string($con,$_POST['usuario']);
				$pass=md5(mysqli_real_escape_string($con,$_POST['clave']));
				$query=mysqli_query($con,"select * from usuario where usuario='$user' and clave='$pass'");
				$result=mysqli_num_rows($query);
				mysqli_close($con);
				if ($result>0) {
					$data=mysqli_fetch_array($query);
					$_SESSION['iduser']=$data['id_user'];
					$_SESSION['user']=$data['usuario'];
					$_SESSION['nombre']=$data['nombre'];
					$_SESSION['active']=true;
					header('location: index.php');
				}else{
					$alerta='El usuario o la contraseña es incorrecto';
					session_destroy();
				}
			}
		}
	}
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
				<input type="text" class="buscador__input-responsive">
				<img src="img/buscar.png" class="btn-buscar-responsive">
				<img src="img/buscar.png" class="btn-buscar">
			</div>
			<div class="buscador__boton">
				<img src="img/menu.png" class="btn-menu">
			</div>
		</div>
		<div class="buscador__div">
			<input type="text" class="buscador__input">
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
				<a href="inicio-sesion.php"><li>Iniciar Sesion</li></a>
				<a href="registrarse.php"><li>Registrarse</li></a>
			</ul>
		</nav>
	</div>
	<div class="contenedor">
		<section id="contenedor__formulario">
    		<form action="" method="post">
    			<img src="img/usuario.png" alt="Iniciar Sesión">
    			<input type="text" name="usuario" placeholder="Email">
    			<input type="password" name="clave" placeholder="Contraseña">
    			<div class="alerta"><?php echo isset($alerta)?$alerta:''; ?></div>
    			<input type="submit" value="Iniciar sesión" class="inicio-sesion">
    			<p>o</p>
    			<a href="registrarse.php" class="boton">Registrarse</a>
    		</form>
    	</section>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<script type="text/javascript" src="js/acciones.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
</body>
</html>