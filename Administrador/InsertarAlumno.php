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
                <li  class="active"><a href="InsertarAlumno.php">Registrar alumnos</a></li>
                <li><a href="InsertarCal.php">Registrar Calificaciones</a></li>
                <li><a href="InsertarEven.php">Registrar Evento</a></li>
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
        <p><h2  align="center">Registro de alumnos</h2><br /></p>
        
        
        <form action="Registro.php" method="post">
        <p align="right"> Genero: <input type="radio" name="Genero" value="M" required> &nbsp;M  &nbsp; &nbsp;
        <input type="radio" name="Genero" value="F"> &nbsp;F<p>
        <table align="center" width=100%>
            <tr>
                <td>Nombre: </td>
                <td>Apellido Paterno:</td>
                <td>Apellido Materno:</td>
            </tr>
            <tr>
                <td> <input type="text" name="nom" required></td>
                <td><input type="text" name="apelp" required></td>
                <td><input type="text" name="apelm" required></td>
            </tr>
            <tr>
                <td>Fecha de nacimiento</td>
                <td>Email</td>
                <td>Telefono</td>
            </tr>
            <tr>
                <td> <input type="date" name="fecha" required></td>
                <td><input type="text" name="email" required></td>
                <td><input type="text" name="telefono" required></td>
            </tr>
            <tr>
                <td>Estado</td>
                <td>Municipio</td>
                <td>Domicilio</td>

            </tr>
            <tr>
                <td> <input type="text" name="Estado" required></td>
                <td><input type="text" name="Municipio" required></td>
                <td><input type="text" name="Domicilio" required></td>
            </tr>
             <tr>
                <td>Estado Civil</td>
                <td>Código Postal</td>
            </tr>
            <tr>
                <td> <input type="text" name="civil" required></td>
                <td> <input type="text" name="cod" required></td>
            </tr>
            </table>
            <br/>
            <br/>
            <br/>
            <p align="center">
            Carrera <br/>
             <select name="carrera">
                <option value="1000ADEV">Ing. Animacion digital y efectos visuales</option>
                <option selected value="300SC">Ing. Sistemas Computacionales</option>
                <option value="400IM">Ing. Mecatronica </option>
                <option value="100IE">Ing. Electromecanica </option>
                <option value="200II">Ing. Industrial</option>
                <option value="800IQ">Ing. Quimica </option>
                <option value="900IMA">Ing. Materiales</option>
                <option value="700GE">Ing. gestion empresarial</option>
                <option value="600CP">Lic. Contaduria</option>
                <option value="500A">Lic. Arquitectura </option>
                <option value="2000T">Lic. Turismo </option>
                
                </select>
                <br /> <br /> <br /> <br />
                <input type="submit" name="boton" value="Registrar Alumno" weidth=30%>
                </p>
        </form>
      
           

    </div>
    </div>
</section>
    
<br/>
<br/>
<br/>

</body>
</html>
