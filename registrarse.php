<?php
    $con=mysqli_connect("localhost","id11811536_root","Hola1234","id11811536_prueba");
	if(!empty($_POST)){
		$alerta='';
		if(empty($_POST['usuario'])||empty($_POST['clave'])||empty($_POST['cclave'])||empty($_POST['nombre'])){
			$alerta='<p class="msg_error">Todos los campos son obligatorios</p>';
		}else{
			if ($_POST['clave']!=$_POST['cclave']) {
				$alerta='<p class="msg_error">La contraseña no concuerda</p>';
			}else{
				$usuario=$_POST['usuario'];
				$clave=md5($_POST['clave']);
				$nombre=$_POST['nombre'];
				$query=mysqli_query($con," select * from usuario where usuario='$usuario' or nombre='$nombre'");
				$result=mysqli_fetch_array($query);
				if($result>0){
					$alerta='<p class="msg_error">El correo o nombre de usuario ya existe</p>';
				}else{
					$query_insert=mysqli_query($con,"insert into usuario (usuario,clave,nombre) values ('$usuario','$clave','$nombre')");
					if ($query_insert) {
						$alerta='<p class="msg_save">Usuario Creado correctamente</p>';
					}else{
						$alerta='<p class="msg_error">Error al crear el usuario</p>';
					}
				}
				mysqli_close($con);
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
    			<center>
    			<img src="img/usuario.png" alt="Registro usuario"></center>
    			<input type="text" name="usuario" placeholder="Email">
    			<input type="password" name="clave" placeholder="Contraseña">
    			<input type="password" name="cclave" placeholder="Confirmar contraseña">
    			<input type="text" name="nombre" placeholder="Nombre">
    			<div class="alerta"><?php echo isset($alerta)?$alerta:''; ?></div>
    			<input type="submit" value="Crear cuenta" class="inicio-sesion">
    			<center>
    			<p>o</p>
    			<a href="inicio-sesion.php" class="boton">Iniciar Sesión</a>
    			</center>
    		</form>
	    </section>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<script type="text/javascript" src="js/acciones.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
</body>
</html>