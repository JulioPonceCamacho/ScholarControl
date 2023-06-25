<?php
    include("../Conexion.php");
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
  <link href="../Imagenes/L.png" rel="icon">
  <link href="../Imagenes/L.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../lib/animate/animate.min.css" rel="stylesheet">
  <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../css/style.css" rel="stylesheet">
</head>


<body>
 <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <h1 class="text-light"><a href="#intro" class="scrollto"><span>TESJO</span></a></h1>
        <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li><a href="index.php">Inicio</a></li>
          <li class="drop-down"><a href="Insertar.php">Dar de Alta </a>
            <ul>
                <li><a href="InsertarDocente.php">Registrar docentes</a></li>
                <li><a href="InsertarAlumno.php">Registrar alumnos</a></li>
                <li><a href="InsertarCal.php">Registrar Calificaciones</a></li>
                <li  class="active"><a href="InsertarEven.php">Registrar Evento</a></li>
            </ul>
          </li>
          <li class="drop-down"> <a href="Bajas.php">Dar de baja</a>
            <ul>
                 <li><a href="Modificar.php">Cambiar datos</a></li>
            </ul>
            </li>
          <li><a href="Consultar.php">Consultar datos</a></li>
           <li><a href="Horarios.php">Horario Cursos</a></li>
           <li><a href="Boletas.php">Boletas</a></li>
           <li class="drop-down"><a href="Calendario.php">Calendario</a>
            <ul>
                <li><a href="Eventos.php">Eventos proximos</a></li>
            </ul>
          </li>
          <li><a href="Acerca.php">Contacto</a></li>
          <li><a href="../index.php">Cerrar Sesión</a></li>
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->

  <main id="main">
<section id="intro" class="clearfix">
    <div class="row justify-content-center align-self-center">
        <div class="col-md-6 intro-info order-md-first order-last">
        <p><h2  align="center">Registro de eventos</h2><br /></p>
        
        <form action="Registro.php" method="post">
        <table align="center" width=100%>
            <tr>
                <td>Fecha: </td>
            </tr>
            <tr>
                <td><input type="date" name="Fecha" required style="width:700px; height:20 px"></td>
            </tr>
            <tr>
                <td>Hora:</td>
            </tr>
            <tr>
                <td> <input type="text" name="Hora" placeholder="1:00 PM" required style="width:700px; height:20 px"></td>
            </tr>
            <tr>
                <td>Descripcion:</td>
            </tr>
            <tr>
                <td> <textarea rows="15" name="Descripcion" required style="width:700px"></textarea></td>
            </tr>
            </table>
            <br/>
            <br/>
                <p align="center"><input type="submit" name="boton" value="Registrar Evento" weidth=30%></p>
        </form>
      
           

    </div>
    </div>
</section>
    
<br/>
<br/>
<br/>

</body>
</html>
