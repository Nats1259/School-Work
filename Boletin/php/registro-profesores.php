<?php
include 'conexion.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$asignatura = $_POST['asignatura'];
$email = $_POST['email'];
$pass = $_POST['password'];
$username = ucwords($nombre . " " . $apellido);

$insertar = "INSERT INTO usuarios(Nombre, Apellido, CompleteName, Email, Password, tipo_usuario, Asignatura,  Avatar, Fecha_reg) Values ('$nombre', '$apellido', '$username', '$email', '$pass', 'Maestro/a', '$asignatura',  'photo.jpg', now())";

$verificar_email = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Email = '$email'");
if(mysqli_num_rows($verificar_email) > 0)
{
    echo '<script>
    alert("El email ya esta registrado");
    window.history.go(-1);
    </script>';
    exit;
}

$verificar_nombre = mysqli_query($conexion, "SELECT * FROM usuarios WHERE CompleteName = '$username'");
if(mysqli_num_rows($verificar_nombre) > 0)
{
    echo '<script>
    alert("Este nombre ya esta registrado");
    window.history.go(-1);
    </script>';
    exit;
}

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
