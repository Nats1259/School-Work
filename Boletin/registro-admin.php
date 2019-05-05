<?php

include 'php/conexion.php';
//Recibir datos y almacenarlos en las variables
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$cargo = $_POST['cargo'];
$pass = $_POST['password'];


$insertar = "INSERT INTO administradores(Nombre, Apellido, Email, Cargo, Password, Fecha_reg) Values ('$nombre', '$apellido', '$email', '$cargo', '$pass', now())";

$verificar_email = mysqli_query($conexion, "SELECT * FROM administradores WHERE Email = '$email'");
if(mysqli_num_rows($verificar_email) > 0) 
{
	'<script>
	alert("El email ya esta registrado");
	window.history.go(-1);
	</script>';
	exit;

}

$resultado = mysqli_query($conexion, $insertar);
if(!$resultado)
{
	'<script>
	alert("Error de registro");
	window.history.go(-1);
	</script>';
	exit;

}
else
{
	'<script>
	alert("Registrado correctamente");
	window.history.go(-1);
	</script>';
	exit;

}

mysqli_close($conexion);