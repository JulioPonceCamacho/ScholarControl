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
          <li class="active"><a href="index.php">Inicio</a></li>
          <li><a href="InsertarCal.php">Registrar Calificacion</a></li>
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
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center">
          <p><h2 align="center">Registrado en el sistema<br /></h2></p>
          <?php
            $IDA=$_POST['AL'];
            $IDM=$_POST['MA'];
            $Sem=$_POST['Sem'];
            $Doc=$_POST['Doc'];
            $U1=$_POST['U1'];  $O1=$_POST['O1']; 
            $U2=$_POST['U2'];  $O2=$_POST['O2']; 
            $U3=$_POST['U3'];  $O3=$_POST['O3']; 
            $U4=$_POST['U4'];  $O4=$_POST['O4']; 
            $U5=$_POST['U5'];  $O5=$_POST['O5']; 
            $U6=$_POST['U6'];  $O6=$_POST['O6']; 
            $Unidades=mysqli_query($conexion,"SELECT * FROM Materias WHERE ID_Materia='".$IDM."'")or die ("Error al procesar la solicitud");
            while($cal = mysqli_fetch_array($Unidades)){
            if($cal['Unidades']=="4"){$P=($U1+$U2+$U3+$U4)/$cal['Unidades']; $U5="null";$U6="null";$O5="null";$O6="null";}
            if($cal['Unidades']=="5"){$P=($U1+$U2+$U3+$U4+$U5)/$cal['Unidades']; $U6="null";$O6="null";}
            if($cal['Unidades']=="6"){$P=($U1+$U2+$U3+$U4+$U5+$U6)/$cal['Unidades'];} 
            }
           mysqli_query($conexion,"INSERT INTO Calificacion(ID_Alumno,ID_Docente,ID_Materia,Unidad1,OportunidadU1,Unidad2,OportunidadU2,Unidad3,OportunidadU3,Unidad4,OportunidadU4,Unidad5,OportunidadU5,Unidad6,OportunidadU6,Promedio,SemestreC) VALUES(".$IDA.",".$Doc.",'".$IDM."',".$U1.",".$O1.",".$U2.",".$O2.",".$U3.",".$O3.",".$U4.",".$O4.",".$U5.",".$O5.",".$U6.",".$O6.",".$P.",".$Sem.")")or die ("Error al procesar la solicitud");
           
           $Cal=mysqli_query($conexion," SELECT *  FROM Calificacion INNER JOIN Materias ON (Calificacion.ID_Materia=Materias.ID_Materia)WHERE ID_Alumno=$IDA AND ID_Docente=$Doc AND Calificacion.ID_Materia='$IDM'") OR DIE ("No pude obtener información");
           echo "<table width=100% border=1>";
            echo "<tr><td>S</td><td>Materia</td><td>Nombre</td><td>U1</td><td>U2</td><td>U3</td><td>U4</td><td>U5</td><td>U6</td><td>Promedio</td> </tr>";
            while($calificaciones = mysqli_fetch_array($Cal)){
            echo "<tr>";
                echo "<td>".$calificaciones['SemestreC']."</td>";
                echo "<td>".$calificaciones['ID_Materia']."</td>";
                echo "<td>".$calificaciones['NombreM']."</td>";
                echo "<td>".$calificaciones['Unidad1']."</td>";
                echo "<td>".$calificaciones['Unidad2']."</td>";
                echo "<td>".$calificaciones['Unidad3']."</td>";
                echo "<td>".$calificaciones['Unidad4']."</td>";
                echo "<td>".$calificaciones['Unidad5']."</td>";
                echo "<td>".$calificaciones['Unidad6']."</td>";
                echo "<td>".round($calificaciones['Promedio'],2)."</td>";
            echo "</tr>";
        }
        echo " </table>";
           
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
          <h3>Operaciones</h3>
          <p>Seleccione el tipo de operación que desea realizar.</p>
        </header>

        <div class="row">

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #fceef3;"><i class="ion-ios-analytics-outline" style="color: #ff689b;"></i></div>
              <h4 class="title"><a href="InsertarCal.php">Dar de alta Calificacion</a></h4>
              <p class="description">Dar calificaciones en el sistema</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #fff0da;"><i class="ion-ios-bookmarks-outline" style="color: #e98e06;"></i></div>
              <h4 class="title"><a href="Calendario.php">Calendario</a></h4>
              <p class="description">Ver el calendario escolar</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #e1eeff;"><i class="ion-ios-world-outline" style="color: #2282ff;"></i></div>
              <h4 class="title"><a href="Eventos.php">Eventos</a></h4>
              <p class="description">Ver eventos proximos.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #e6fdfc;"><i class="ion-ios-paper-outline" style="color: #3fcdc7;"></i></div>
              <h4 class="title"><a href="Horarios.php">Horarios Cursos</a></h4>
              <p class="description">Consulte informacion de los horarios respecto a cada materia, que profesor la imparte y que alumnos estan inscritos.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #eafde7;"><i class="ion-ios-speedometer-outline" style="color:#41cf2e;"></i></div>
              <h4 class="title"><a href="Consultar.php">Consultar Kardex</a></h4>
              <p class="description">Ver información personal y historia de actividades</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #ecebff;"><i class="ion-ios-clock-outline" style="color: #8660fe;"></i></div>
              <h4 class="title"><a href="Acerca.php">Acerca de</a></h4>
              <p class="description">Información de los desarrolladores</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #services -->

</body>
</html>
