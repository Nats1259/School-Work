<?php

include 'conexion.php';
//Recibir datos y almacenarlos en las variables
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$grado = $_POST['grado'];
$modal = $_POST['modalidad'];
$sexo = $_POST['sexo'];
$pass = $_POST['password'];
$username = ucwords($nombre . " " . $apellido);

$insertar = "INSERT INTO estudiantes(Nombre, Apellido, CompleteName, Email, Grado, Modalidad, Sexo, Password, Avatar, Fecha_reg) Values('$nombre', '$apellido', '$username', '$email', '$grado', '$modal', '$sexo', '$pass', 'photo.jpg', now())";

$verificar_email = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE Email = '$email'");
if(mysqli_num_rows($verificar_email) > 0)
{
    echo '<script>
    alert("El email ya está registrado");
    window.history.go(-1);
    </script>';
    exit;
}

//Ejecutar consulta
$resultado = mysqli_query($conexion, $insertar);
if(!$resultado)
{
    echo '<script>
    alert("Error al registrarse");
    window.history.go(-1);
    </script>';
    exit;
}
else
{
    echo '<script>
    alert("Usuario registrado correctamente");
    window.history.go(-1);
    </script>';
    exit;
}

mysqli_close($conexion);