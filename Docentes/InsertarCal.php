<?php
    session_start();
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
          <li  class="active"><a href="InsertarCal.php">Registrar Calificacion</a></li>
          <li><a href="Calendario.php">Calendario</a> </li>
          <li><a href="Eventos.php">Eventos</a></li>
          <li><a href="Consultar.php">Consultar Kardex</a></li>
           <li><a href="Horarios.php">Horario Cursos</a></li>
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
        <p><h2  align="center">Registro de calificaciones</h2><br /></p>
       <form action="Registro.php" method="post">
        <table align="center" weidth=100%>
                <tr>
                    <td>No.Control Alumno:</td>
                    <td>Materia a evaluar:</td>
                </tr>
                <tr>
                    <td><input type="text" name="AL" required></td>
                    <td><input type="text" name="MA" required></td>
                </tr>
                <tr>
                    <td>No.control Docente:</td>
                    <td>Semestre:</td>
                </tr>
                <tr>
                    <td><input type="text" name="Doc" placeholder="<?php echo $_SESSION['codigo'] ?>" value="<?php echo $_SESSION['codigo'] ?>" readonly></td>
                    <td><input type="text" name="Sem" required></td>
                </tr>
            </table>
             <table align="center" weidth=100%>
                <tr>
                    <td>Unidad 1</td>
                    <td>Oportunidad</td>
                </tr>
                <tr>
                    <td><input type="number" name="U1"></td>
                    <td><input type="number" name="O1"></td>
                </tr>
                <tr>
                    <td>Unidad 2</td>
                    <td>Oportunidad</td>
                </tr>
                <tr>
                    <td><input type="number" name="U2"></td>
                    <td><input type="number" name="O2"></td>
                </tr>
                <tr>
                    <td>Unidad 3</td>
                    <td>Oportunidad</td>
                </tr>
                <tr>
                    <td><input type="number" name="U3"></td>
                    <td><input type="number" name="O3"></td>
                </tr>
                <tr>
                
                    <td>Unidad 4</td>
                    <td>Oportunidad</td>
                </tr>
                <tr>
                    <td><input type="number" name="U4"></td>
                    <td><input type="number" name="O4"></td>
                </tr>
                <tr>
                    <td>Unidad 5</td>
                    <td>Oportunidad</td>
                </tr>
                <tr>
                    <td><input type="number" name="U5"></td>
                    <td><input type="number" name="O5"></td>
                </tr>
                <tr>
                    <td>Unidad 6</td>
                    <td>Oportunidad</td>
                </tr>
                <tr>
                    <td><input type="number" name="U6"></td>
                    <td><input type="number" name="O6"></td>
                </tr>
                
            </table>
             <p align="center">
              <br /> <br /> <br /> <br />
                <input type="submit" name="boton" value="Registrar Calificacion" weidth=30%>
           </p>
        </form>

    </div>
    </div>
</section>
    

</body>
</html>
