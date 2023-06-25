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
          <li  class="active"><a href="Consultar.php">Consultar datos</a></li>
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
        <p><h2  align="center">Consultar datos</h2><br /></p>
        
      
        <form action="Consultar.php" method="post">
           <p align="center">
         Buscar: 
        <select name="Opcion">
                <option>Alumno</option>
                <option>Docente</option>
                <option>Materias</option>
                </select>
                &nbsp;&nbsp;
            <input type="text" name="codigo" placeholder="Numero de control">
            <input type="submit" name="name" placeholder="Buscar">
        </p>
        </form>
       
          <?php
        $O=$_POST["Opcion"];
        if ($O=="Alumno"){
        $C=$_POST["codigo"];
        $Cal=mysqli_query($conexion,"SELECT *  FROM Calificacion INNER JOIN Materias ON (Calificacion.ID_Materia=Materias.ID_Materia)WHERE ID_Alumno=$C ORDER BY SemestreC");
        $registros=mysqli_query($conexion,"SELECT *  FROM Alumnos INNER JOIN Carreras ON(Carreras.ID_Carrera=Alumnos.ID_Carrera) INNER JOIN Direcciones ON(Direcciones.ID_Direccion=Alumnos.ID_Direccion) INNER JOIN Grupos ON(Grupos.ID_Grupo=Alumnos.ID_Grupo) WHERE ID_Alumno='$C'");
        echo "<table width=100% border=1><tr>";
            while($registro = mysqli_fetch_array($registros)){
                        echo "<td>Nombre completo: </td>";
                        echo "<td>".$registro['NombreAlumno']." ".$registro['ApellidoPA']." ".$registro['ApellidoMA']."</td>";
                        echo "<td>Fecha de Nacimiento: </td>";
                        echo "<td>".$registro['FechaNacimiento']."</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>Fecha de ingreso: </td>";
                        echo "<td>".$registro['FechaIngresoA']."</td>";
                        echo "<td>Carrera: </td>";
                        echo "<td>".$registro['NombreCarrera']."</td>";
                    echo "</tr>";
                     echo "<tr>";
                        echo "<td>Telefono: </td>";
                        echo "<td>".$registro['TelefonoA']."</td>";
                        echo "<td>Email: </td>";
                        echo "<td>".$registro['EmailA']."</td>";
                    echo "</tr>";
                     echo "<tr>";
                        echo "<td>Regular: </td>";
                        echo "<td>".$registro['RegularA']."</td>";
                        echo "<td>Estado: </td>";
                        echo "<td>".$registro['EstadoA']."</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>Direccion: </td>";
                        echo "<td>".$registro['Pais']."</td>";
                        echo "<td>".$registro['Estado']."</td>";
                        echo "<td>".$registro['Municipio'].", ".$registro['DomicilioA']."</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>Semestre:".$registro['Semestre'] ."</td>";
                        echo "<td>Grupo: ".$registro['ID_Grupo']."</td>";
                        echo "<td>Turno ".$registro['Turno']."</td>";
                        echo "<td>Estado Civil: ".$registro['EstadoCivilA']."</td>";
                    echo "</tr>";
            }
            echo "</table>";
        ?>
        
        <br />
        <p align="center"><h3>Calificaciones</h3></p>
        <table width=100% border=1>
            <tr><td>S</td><td>Materia</td><td>Nombre</td><td>U1</td><td>U2</td><td>U3</td><td>U4</td><td>U5</td><td>U6</td><td>Promedio</td> </tr>
        <?php
        $promedio=0;
        $contador=0;
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
                $contador=$contador+1;
                $promedio=$promedio+$calificaciones['Promedio'];
            echo "</tr>";
        }
        echo " </table>";
        $promedio=$promedio/$contador;
      ?>
       <br /><br /><br /> 
      <h5 align="right">Promedio General: 
      <?php
        echo $promedio;
        }
        ?>
        </h5>
    <?php
         if ($O=="Docente"){
          $C=$_POST["codigo"];
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
    }?>
    <?php
    if($O=="Materias"){
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
    
        $Al = mysqli_query($conexion,"SELECT * FROM Alumnos INNER JOIN Clases ON (Clases.ID_Grupo=Alumnos.ID_Grupo) WHERE  ID_Clase='".$B['ID_Clase']."'") or die ("Me mori");
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
