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
          <li><a href="InsertarCal.php">Registrar Calificacion</a></li>
          <li><a href="Calendario.php">Calendario</a> </li>
          <li><a href="Eventos.php">Eventos</a></li>
          <li  class="active"><a href="Consultar.php">Consultar Kardex</a></li>
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
        <p><h2  align="center">Consultar Kardex</h2><br /></p>
        
        <?php
          $C=$_SESSION["codigo"];
        $Cal=mysqli_query($conexion,"SELECT DISTINCT Calificacion.ID_Materia, Materias.NombreM  FROM Calificacion INNER JOIN Materias ON (Calificacion.ID_Materia=Materias.ID_Materia)WHERE ID_Docente=$C");
        $registros=mysqli_query($conexion,"SELECT *  FROM Docentes INNER JOIN JefeDivision ON(JefeDivision.ID_Jefe=Docentes.ID_Jefe) INNER JOIN Direcciones ON(Direcciones.ID_Direccion=Docentes.ID_Direccion) WHERE ID_Docente='$C'");
        echo "<table width=100% height=40%><tr>";
            while($registro = mysqli_fetch_array($registros)){
                        echo "<td>Nombre completo: </td>";
                        echo "<td>".$registro['NombreD']." ".$registro['ApellidoPD']." ".$registro['ApellidoMD']."</td>";
                        echo "<td>Fecha de Nacimiento: </td>";
                        echo "<td>".$registro['FechaNacimientoD']."</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>Fecha de ingreso: </td>";
                        echo "<td>".$registro['FechaIngresoD']."</td>";
                        echo "<td>Coordinador: </td>";
                        echo "<td>".$registro['NombreJefe']." ".$registro['ApellidoPJ']." ".$registro['ApellidoMJ']."</td>";
                    echo "</tr>";
                     echo "<tr>";
                        echo "<td>Telefono: </td>";
                        echo "<td>".$registro['TelefonoD']."</td>";
                        echo "<td>Email: </td>";
                        echo "<td>".$registro['EmailD']."</td>";
                    echo "</tr>";
                     echo "<tr>";
                        echo "<td>Estudios: </td>";
                        echo "<td>".$registro['EstudiosD']."</td>";
                        echo "<td>Genero: </td>";
                        echo "<td>".$registro['GeneroD']."</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>Direccion: </td>";
                        echo "<td>".$registro['Pais']."</td>";
                        echo "<td>".$registro['Estado']."</td>";
                        echo "<td>".$registro['Municipio'].", ".$registro['DomicilioD']."</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>Estado Civil: ".$registro['EstadoCivilD']."</td>";
                    echo "</tr>";
            }
            echo "</table>";
        
    ?>
    <br />
        <p align="center"><h3>Materias que ha impartido en la institución</h3></p>
        <table width=100% border=1>
            <tr><td>Materia</td><td>Nombre</td></tr>
        <?php
        $promedio=0;
        $contador=0;
          while($calificaciones = mysqli_fetch_array($Cal)){
            echo "<tr>";
                echo "<td>".$calificaciones['ID_Materia']."</td>";
                echo "<td>".$calificaciones['NombreM']."</td>";
            echo "</tr>";
            }
            echo "</table>";
    ?>
        
    </div>
    </div>
</section>

</body>
</html>
