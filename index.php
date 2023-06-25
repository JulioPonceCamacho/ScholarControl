<?php
    session_destroy();
    include("Conexion.php");
    $conexion=conectar(); ?>
<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <title>TESJO</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicons -->
    <link href="Imagenes/L.png" rel="icon">
    <link href="Imagenes/L.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,
    600,700" rel="stylesheet">
    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">
    <script src="js/custom.js"></script>
    </head>
    <body onload="nobackbutton();">
        <header id="header">
        <div class="container">
        <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
            <h1 class="text-light"><a href="#intro" class="scrollto"><span>TESJO</span></a></h1>
        <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
        </div>
            <h2 align="right">Iniciar Sesión</h2>
        </div>
        </header><!-- #header -->
        <section id="intro" class="clearfix">
            <div class="container d-flex h-100">
            <div class="row justify-content-center align-self-center">
            <div class="col-md-6 intro-info order-md-first order-last">
                <h2>Sistema de Control<br> Escolar TESJO</h2>
                <form action="index.php" method="post">
                    <h3>Numero de control: <br /></h3>
                    <input type="text" name="codigo" placeholder="Numero de control" size=50>
                    <br /><br />
                    <h3>Contraseña: <br /></h3>
                    <input type="password" name="contra" placeholder="Password" size=50>
                    <br /><br /><br />
                    <p align="center"><input style="color: #1565C0" style="border: #1565C0 1px solid;" type="submit"
                    name="boton" value="Ingresar al Sistema"></p>
                </form></div>
            <div class="col-md-6 intro-img order-md-last order-first">
            <img src="Imagenes/LG.jpeg" alt="" class="img-fluid">
            <?php if($_POST['boton']=="Ingresar al Sistema"){
                session_start();
                $comprobarU=$_POST['codigo'];
                $comprobarP=$_POST['contra'];
                $consulta=mysqli_query($conexion,"SELECT * FROM Alumnos WHERE ID_Alumno=$comprobarU AND
                ContraseñaA='$comprobarP'") or die ("No se pudo procesar la solicitud");
                while($com = mysqli_fetch_array($consulta)){
                    mysqli_query($conexion,"UPDATE SesionActual SET Codigo=$comprobarU WHERE numero=1") or die ("No se
                    pudo procesar la solicitud");
                    $_SESSION['codigo']=$comprobarU;
                    echo "<h2>Inicio de Alumno exitoso </h2>";
                    // Redirecciono al usuario a la página principal del sitio.
                    header("HTTP/1.1 302 Moved Temporarily"); 
                    header("Location: Alumnos/index.php"); 
                }
                $consulta=mysqli_query($conexion,"SELECT * FROM Docentes WHERE ID_Docente=$comprobarU AND
                ContraseñaD='$comprobarP'") or die ("No se pudo procesar la solicitud");
                while($com = mysqli_fetch_array($consulta)){
                    mysqli_query($conexion,"UPDATE SesionActual SET Codigo=$comprobarU WHERE numero=1") or die ("No
                    se pudo procesar la solicitud");
                $_SESSION['codigo']=$comprobarU; 
                echo "<h2>Inicio de Docente exitoso </h2>";
                //Redirecciona a la pagina principal
                header("HTTP/1.1 302 Moved Temporarily"); 
                header("Location: Docentes/index.php");
            }
                $consulta=mysqli_query($conexion,"SELECT * FROM JefeDivision WHERE ID_Jefe=$comprobarU AND
                ContraseñaJ='$comprobarP'") or die ("No se pudo procesar la solicitud");
                while($com = mysqli_fetch_array($consulta)){
                mysqli_query($conexion,"UPDATE SesionActual SET Codigo=$comprobarU WHERE numero=1") or die ("No se
                pudo procesar la solicitud");
                $_SESSION['codigo']=$comprobarU; 
                echo "<h2>Inicio de Administrador exitoso </h2>";
                //Redirecciona a la pagina principal
                header("HTTP/1.1 302 Moved Temporarily"); 
                header("Location: Administrador/index.php");
            }
            }
            ?>
            </div></div></div>
        </section><!-- #intro -->
        <main id="main">
     </body> 
</html>