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
          <li><a href="InsertarCal.php">Registrar Calificacion</a></li>
          <li><a href="Calendario.php">Calendario</a> </li>
          <li><a href="Eventos.php">Eventos</a></li>
          <li><a href="Consultar.php">Consultar Kardex</a></li>
           <li  class="active"><a href="Horarios.php">Horario Cursos</a></li>
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
        <form action="Horarios.php" method="post">
           <p align="center">
            <h2>Horarios de Materias</h2>
            <input type="text" name="codigo" placeholder="Clave Materia">
            <input type="submit" name="name" value="Buscar">
        </p>
        </form>
       
    <?php
    $O=$_POST['name'];
    if($O=="Buscar"){
     $C=$_POST["codigo"];
     $Busq = mysqli_query($conexion,"SELECT * FROM Materias WHERE ID_Materia='$C'") or die ("Me mori");
     echo "<table width=100%>";
      echo "<tr><tr><td>Clave</td><td>Nombre</td><td>Unidades</td><td>Creditos</td><td>Total de Horas</td></tr>";
     while($B = mysqli_fetch_array($Busq)){
        echo "<tr>";
                echo "<td>".$B['ID_Materia']."</td>";
                echo "<td>".$B['NombreM']."</td>";
                echo "<td>".$B['Unidades']."</td>";
                echo "<td>".$B['Creditos']."</td>";
                echo "<td>".$B['HorasTotales']."</td>";
            echo "</tr>";
            }
        echo "</table>";
    $Busq = mysqli_query($conexion,"SELECT * FROM Clases INNER JOIN Docentes ON(Clases.ID_Docente=Docentes.ID_Docente) INNER JOIN Grupos ON(Grupos.ID_Grupo=Clases.ID_Grupo) WHERE ID_Materia='$C'") or die ("Me mori");
     while($B = mysqli_fetch_array($Busq)){
        echo "<br/>Docente: ".$B['NombreD']." ".$B['ApellidoPD']." ".$B['ApellidoMD'];
        echo "<br/>Grupo: ".$B['ID_Grupo'];
        echo "<br/>Horarios: <br/>";
        $Ho = mysqli_query($conexion,"SELECT * FROM Horario_Clases WHERE ID_Clase='".$B['ID_Clase']."'") or die ("Me mori");
        echo "<table width=100% border=1>";
        echo "<tr><tr><td>Dia de la Semana</td><td>Hora Inicio</td><td>Hora Final</td></tr>";
         while($H = mysqli_fetch_array($Ho)){
        echo "<tr>";
                echo "<td>".$H['Dia']."</td>";
                echo "<td>".$H['HoraInicio']."</td>";
                echo "<td>".$H['HoraFinal']."</td>";
            echo "</tr>";
            }
    echo "</table>";
    
        $Al = mysqli_query($conexion,"SELECT * FROM Alumnos INNER JOIN Clases ON (Clases.ID_Grupo=Alumnos.ID_Grupo) WHERE  ID_Clase='".$B['ID_Clase']."' ORDER BY ID_Alumno") or die ("Me mori");
        echo "Alumnos inscritos a la clase <br/>";
        echo "<table width=100% border=1>";
        echo "<tr><tr><td>No.Control</td><td>Nombre</td></tr>";
         while($A = mysqli_fetch_array($Al)){
        echo "<tr>";
                echo "<td>".$A['ID_Alumno']."</td>";
                echo "<td>".$A['NombreAlumno']." ".$A['ApellidoPA']." ".$A['ApellidoMA']."</td>";
            echo "</tr>";
            }
    echo "</table>";
    echo "<br/><br/>";
            }
        
    }
    
    ?>
    
    
    </div>
    </div>
</section>

</body>
</html>
