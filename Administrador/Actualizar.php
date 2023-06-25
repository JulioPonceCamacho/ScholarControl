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
                <li><a href="InsertarEven.php">Registrar Evento</a></li>
            </ul>
          </li>
          <li class="drop-down"> <a href="Bajas.php">Dar de baja</a>
            <ul>
                 <li class="active"><a href="Modificar.php">Cambiar datos</a></li>
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
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center">
          <p><h2 align="center">Información Actualizada en el sistema<br /></h2></p>
          <?php
        if($_POST['boton']=="Modificar Alumno"){
          $C=$_POST['codigo'];
          $NOM=$_POST['NAN'];     
          $AP=$_POST['APN'];     
          $AM=$_POST['AMN'];  

          $TEL=$_POST['TN'];
          $DOM=$_POST['DM'];
          $EMAIL=$_POST['EMN'];
          
          $RG=$_POST['RN'];
          $SE=$_POST['SN'];
          $ES=$_POST['EAN'];
          $GN=$_POST['GN'];
          $EC=$_POST['EC'];
          $TRN=$_POST['TRN'];
          
          

        mysqli_query($conexion,"UPDATE Alumnos set NombreAlumno='".$NOM."', ApellidoPA='".$AP."', ApellidoMA='".$AM."', EstadoCivilA='".$EC."', EmailA='".$EMAIL."',
        TelefonoA='".$TEL."', RegularA='".$RG."', ID_Grupo='".$GN."' where ID_Alumno=".$C." ")or die ("Error al actualizar");
        
        }
     ?>
     <?php
     if($_POST['boton']=="Modificar Docente"){
          $C=$_POST['codigoD'];
          $NOM=$_POST['NAN'];     
          $AP=$_POST['APN'];     
          $AM=$_POST['AMPN'];  

          $TEL=$_POST['TN'];
          $EST=$_POST['EST'];
          $EMAIL=$_POST['EMN'];
        
          $GN=$_POST['GN'];
          $EC=$_POST['EC'];
         echo "UPDATE Docentes set NombreD='".$NOM."', ApellidoPD='".$AP."', ApellidoMD='".$AM."', EstadoCivilD='".$EC."', EmailD='".$EMAIL."',
         TelefonoD='".$TEL."',GeneroD='".$GN."',EstudiosD='".$EST."' where ID_Docente=".$C." ";
        mysqli_query($conexion,"UPDATE Docentes set NombreD='".$NOM."', ApellidoPD='".$AP."', ApellidoMD='".$AM."', EstadoCivilD='".$EC."', EmailD='".$EMAIL."',
        TelefonoD='".$TEL."',GeneroD='".$GN."',EstudiosD='".$EST."' where ID_Docente=".$C." ")or die ("Error al actualizar Docente");
        
        }
     
     ?>
    
     </div>
     </div>
   </section><!-- #intro -->
 
   
 <br/>
 <br/>
 <br/>
     <!--==========================
       Services Section
     ============================-->
     <section id="services" class="section-bg">
       <div class="container">
 
         <header class="section-header">
           <h3>Dar de alta</h3>
           <p>Seleccione el tipo de operación que desea realizar.</p>
         </header>
 
         <div class="row">
 
           <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
             <div class="box">
               <div class="icon" style="background: #fceef3;"><i class="ion-ios-analytics-outline" style="color: #ff689b;"></i></div>
               <h4 class="title"><a href="InsertarAlumno.php">Registrar nuevo alumno</a></h4>
               <p class="description"></p>
             </div>
           </div>
           <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
             <div class="box">
               <div class="icon" style="background: #fff0da;"><i class="ion-ios-bookmarks-outline" style="color: #e98e06;"></i></div>
               <h4 class="title"><a href="InsertarDocente.php">Registrar Nuevo docente</a></h4>
               <p class="description"></p>
             </div>
           </div>
 
           <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
             <div class="box">
               <div class="icon" style="background: #e6fdfc;"><i class="ion-ios-paper-outline" style="color: #3fcdc7;"></i></div>
               <h4 class="title"><a href="InsertarCal.php">Registro de calificaciones</a></h4>
               <p class="description"></p>
             </div>
           </div>
          
 
         </div>
 
       </div>
     </section><!-- #services -->
 
 </body>
 </html>
 