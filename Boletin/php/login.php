<?php

$alerta = '';
session_start();

if(!empty($_SESSION['active']))
{
    header("Location: php/index.php");
}
else
{
if(!empty($_POST))
{
    if(empty($_POST['email']) || empty($_POST['password']))
    {
        $alerta = 'Ingrese su email y su contraseña';
    }
    else
    {
        require_once 'conexion.php';
        
        $email = $_POST['email'];
        $pass = $_POST['password'];
        
        $query = mysqli_query($conexion, "SELECT * FROM administradores WHERE Email = '$email' AND Password = '$pass'");
        $result = mysqli_num_rows($query);
        
        if($result > 0)
        {
            $data = mysqli_fetch_array($query);
            session_start();
            $_SESSION['active'] = true;
            $_SESSION['nombre'] = $data['Nombre'];
            $_SESSION['apellido'] = $data['Apellido'];
            $_SESSION['complete'] = $data['CompleteName'];
            $_SESSION['email'] = $data['Email'];
            $_SESSION['password'] = $data['Password'];
            $_SESSION['tipo_usuario'] = $data['tipo_usuario'];
            $_SESSION['cargo'] = $data['Cargo'];
            $_SESSION['sexo'] = $data['Sexo'];
            $_SESSION['grado'] = $data['Grado'];
            $_SESSION['modalidad'] = $data['Modalidad'];
            $_SESSION['nacimiento'] = $data['Fecha_Nacimiento'];
            $_SESSION['asignatura'] = $data['Asignatura'];
            $_SESSION['avatar'] = $data['Avatar'];
            
            header("location: php/index.php");
        }
        else
        {
            $alerta = "El email y/o la contraseña son incorrectos";
            session_destroy();
        }
    }
}
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap2.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/-Login-form-Page-BS4-.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row mh-100vh">
            <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">
                <div class="m-auto w-lg-75 w-xl-50">
                    <h2 class="text-info font-weight-light mb-5"><i class="fa fa-diamond"></i>&nbsp;Your company</h2>
                    <form>
                        <div class="form-group"><label class="text-secondary">Email</label><input class="form-control" type="text" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,15}$" inputmode="email"></div>
                        <div class="form-group"><label class="text-secondary">Password</label><input class="form-control" type="password" required=""></div>
                        <div class="alerta"><?php echo isset($alerta) ? $alerta : ''; ?></div>
                        <button class="btn btn-info mt-2" type="submit">Log In</button></form>
                    <p class="mt-3 mb-0"><a href="#" class="text-info small">Forgot your email or password?</a></p>
                </div>
            </div>
            <div class="col-lg-6 d-flex align-items-end" id="bg-block" style="background-image: url(&quot;assets/img/a2df930a21710ae477e610ba4d9849d6.jpg&quot;);background-size: cover;background-position: center center;">
                <p class="ml-auto small text-dark mb-2"><em>Photo by&nbsp;</em><a href="https://unsplash.com/photos/v0zVmWULYTg?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText" target="_blank" class="text-dark"><em>Aldain Austria</em></a><br></p>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>