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
                 <li><a href="Modificar.php">Cambiar datos</a></li>
            </ul>
            </li>
          <li><a href="Consultar.php">Consultar datos</a></li>
           <li><a href="Horarios.php">Horario Cursos</a></li>
           <li class="active"><a href="Boletas.php">Boletas</a></li>
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
        <p><h2  align="center">Boletas de Calificaciones</h2><br /></p>
        
      
        <form action="Boletas.php" method="post">
           <p align="center">
         Buscar: 
        <select name="Semestre">
                <option value="1">1 Semestre</option>
                <option value="2">2 Semestre</option>
                <option value="3">3 Semestre</option>
                <option value="4">4 Semestre</option>
                <option value="5">5 Semestre</option>
                <option value="6">6 Semestre</option>
                <option value="7">7 Semestre</option>
                <option value="8">8 Semestre</option>
                <option value="9">9 Semestre</option>
                <option value="10">Todos los Semestres</option>
                </select>
                &nbsp;&nbsp;
            <input type="text" name="codigo" placeholder="Numero de control">
            <input type="submit" name="name" value="Buscar">
        </p>
        </form>
       
          <?php
        $O=$_POST["name"];
        if ($O=="Buscar"){
        $C=$_POST["codigo"];
        $registros=mysqli_query($conexion,"SELECT *  FROM Alumnos INNER JOIN Carreras ON(Carreras.ID_Carrera=Alumnos.ID_Carrera) INNER JOIN Direcciones ON(Direcciones.ID_Direccion=Alumnos.ID_Direccion) INNER JOIN Grupos ON(Grupos.ID_Grupo=Alumnos.ID_Grupo) WHERE ID_Alumno='$C'");
        echo "<table width=100%><tr>";
            while($registro = mysqli_fetch_array($registros)){
                        echo "<td>Carrera: </td>";
                        echo "<td>".$registro['NombreCarrera']."</td>";
                        echo "<td>No. Control: </td>";
                        echo "<td>".$registro['ID_Alumno']."</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>Nombre completo: </td>";
                        echo "<td>".$registro['NombreAlumno']." ".$registro['ApellidoPA']." ".$registro['ApellidoMA']."</td>";
                        echo "<td>Semestre:".$registro['Semestre'] ."</td>";
                        echo "<td>Regular:".$registro['RegularA']."</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>Estado: </td>";
                        echo "<td>".$registro['EstadoA']."</td>";
                        echo "<td>Grupo: ".$registro['ID_Grupo']."</td>";
                        echo "<td>Turno ".$registro['Turno']."</td>";
                    echo "</tr>";
            }
            echo "</table>";
        ?>
        
        <br /><br /><br /> 
        <p align="center"><h3>Calificaciones</h3></p>
        <?php
        $promedio=0;
        $contador=0;
        $S=$_POST['Semestre'];
        if($S<10){
         echo "<p><h3>Boleta Semestre ".$S." </h3></p>";
         echo "<table width=100% border=1>";
            echo "<tr><td>Materia</td><td>Nombre</td><td>U1</td><td>U2</td><td>U3</td><td>U4</td><td>U5</td><td>U6</td><td>Oportunidad</td><td>Promedio</td> </tr>";
        $Cal=mysqli_query($conexion,"SELECT *  FROM Calificacion INNER JOIN Materias ON (Calificacion.ID_Materia=Materias.ID_Materia)WHERE (ID_Alumno=".$C.") AND (SemestreC=".$S.") ORDER BY Materias.ID_Materia");
          while($calificaciones = mysqli_fetch_array($Cal)){
            echo "<tr>";
            if($calificaciones['Oportunidad1']==2 || $calificaciones['Oportunidad2']==2 || $calificaciones['Oportunidad3']==2 || $calificaciones['Oportunidad4']==2 || $calificaciones['Oportunidad5']==2 || $calificaciones['Oportunidad6']==2 ) $Op="2";
            else $Op="1";
                echo "<td>".$calificaciones['ID_Materia']."</td>";
                echo "<td>".$calificaciones['NombreM']."</td>";
                echo "<td>".$calificaciones['Unidad1']."</td>";
                echo "<td>".$calificaciones['Unidad2']."</td>";
                echo "<td>".$calificaciones['Unidad3']."</td>";
                echo "<td>".$calificaciones['Unidad4']."</td>";
                echo "<td>".$calificaciones['Unidad5']."</td>";
                echo "<td>".$calificaciones['Unidad6']."</td>";
                echo "<td>".$Op."</td>";
                echo "<td>".round($calificaciones['Promedio'],2)."</td>";
                $contador=$contador+1;
                $promedio=$promedio+$calificaciones['Promedio'];
            echo "</tr>";
        }
        echo " </table>";
        $promedio=$promedio/$contador;
      ?>
       <br /><br /><br /> 
      <h5 align="right">Promedio semestre <?php echo $S .": ";
        echo $promedio;
        }
        else{
        $promedio=0;
        $contador=0;
        $S=1;
        while($S!=10){
        $Cal=mysqli_query($conexion,"SELECT *  FROM Calificacion INNER JOIN Materias ON (Calificacion.ID_Materia=Materias.ID_Materia)WHERE (ID_Alumno=".$C.") AND (SemestreC=".$S.") ORDER BY Materias.ID_Materia");
        if(empty( mysqli_fetch_array($Cal))==false){
        echo "<p><h3>Boleta Semestre ".$S." </h3></p>";
         echo "<table width=100% border=1>";
            echo "<tr><td>Materia</td><td>Nombre</td><td>U1</td><td>U2</td><td>U3</td><td>U4</td><td>U5</td><td>U6</td><td>Oportunidad</td><td>Promedio</td> </tr>";
          while($calificaciones = mysqli_fetch_array($Cal)){
            echo "<tr>";
            if($calificaciones['Oportunidad1']==2 || $calificaciones['Oportunidad2']==2 || $calificaciones['Oportunidad3']==2 || $calificaciones['Oportunidad4']==2 || $calificaciones['Oportunidad5']==2 || $calificaciones['Oportunidad6']==2 ) $Op="2";
            else $Op="1";
                echo "<td>".$calificaciones['ID_Materia']."</td>";
                echo "<td>".$calificaciones['NombreM']."</td>";
                echo "<td>".$calificaciones['Unidad1']."</td>";
                echo "<td>".$calificaciones['Unidad2']."</td>";
                echo "<td>".$calificaciones['Unidad3']."</td>";
                echo "<td>".$calificaciones['Unidad4']."</td>";
                echo "<td>".$calificaciones['Unidad5']."</td>";
                echo "<td>".$calificaciones['Unidad6']."</td>";
                echo "<td>".$Op."</td>";
                echo "<td>".round($calificaciones['Promedio'],2)."</td>";
                $contador=$contador+1;
                $promedio=$promedio+$calificaciones['Promedio'];
            echo "</tr>";
        }
        echo " </table>";
        }$S=$S+1;
        echo "<br/><br/>";
        
        }?>
          <br /><br /><br /> 
      <h5 align="right">Promedio General: <?php echo round($promedio/$contador,2);?></h5>
        <?php 
        }
    } ?>
        
       
        
    </div>
    </div>
</section>

</body>
</html>
