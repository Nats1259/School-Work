<?php

include 'conexion.php';
//Recibir datos y almacenarlos en las variables
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$cargo = $_POST['cargo'];
$pass = $_POST['password'];
$username = ucwords($nombre . " " . $apellido);

$insertar = "INSERT INTO administradores(Nombre, Apellido, CompleteName, Email, Cargo, Password, Avatar, Fecha_reg) Values ('$nombre', '$apellido', '$username', '$email', '$cargo', '$pass', 'photo.jpg', now())";

$verificar_email = mysqli_query($conexion, "SELECT * FROM administradores WHERE Email = '$email'");
if(mysqli_num_rows($verificar_email) > 0) 
{
	echo '<script>
	alert("El email ya esta registrado");
	window.history.go(-1);
	</script>';
	exit;
}

$resultado = mysqli_query($conexion, $insertar);
if(!$resultado)
{
	echo '<script>
	alert("El email ya esta registrado");
	window.history.go(-1);
	</script>';
	exit;
}
else
{
	echo '<script>
	alert("El email ya esta registrado");
	window.history.go(-1);
	</script>';
	exit;
}

mysqli_close($conexion);