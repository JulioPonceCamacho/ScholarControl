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
        <p><h2  align="center">Dar de baja</h2><br /></p>
        
      
        <form action="Bajas.php" method="post">
           <p align="center">
         Buscar: 
        <select name="Opcion">
                <option>Alumno</option>
                <option>Docente</option>
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
       
        $registros=mysqli_query($conexion,"SELECT *  FROM Alumnos INNER JOIN Carreras ON(Carreras.ID_Carrera=Alumnos.ID_Carrera) INNER JOIN Direcciones ON(Direcciones.ID_Direccion=Alumnos.ID_Direccion) INNER JOIN Grupos ON(Grupos.ID_Grupo=Alumnos.ID_Grupo) WHERE ID_Alumno='$C'");
        
         if(empty(mysqli_fetch_array($registros))==false){
          
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
      <br/><br/><br/>

        <form action="Bajas.php" method="post">
            <p align="center">
                <input type="radio" name="Numero" checked requiered value="<?php echo $C; ?>"><?php echo $C; ?> <br/>
                <input type="submit" name="BB" value="Dar de baja al Alumno">
            </p>
        </form>
        
       <?php }
       else echo "<br/><br/><h3>Alumno no encontrado</h3> <br/>";
       } ?>
        <?php
            if($_POST['BB']=="Dar de baja al Alumno"){
                $N=$_POST['Numero'];
                mysqli_query($conexion, "DELETE FROM Alumnos WHERE ID_Alumno=$N") or die ("No se pudo eliminar el alumno correctamente.");
                echo "Se ha dado de baja correctamente";
            }
       ?>
    <?php
         if ($O=="Docente"){
          $C=$_POST["codigo"];
        $Cal=mysqli_query($conexion,"SELECT DISTINCT Calificacion.ID_Materia, Materias.NombreM  FROM Calificacion INNER JOIN Materias ON (Calificacion.ID_Materia=Materias.ID_Materia)WHERE ID_Docente=$C");
        
        $registros=mysqli_query($conexion,"SELECT *  FROM Docentes INNER JOIN JefeDivision ON(JefeDivision.ID_Jefe=Docentes.ID_Jefe) INNER JOIN Direcciones ON(Direcciones.ID_Direccion=Docentes.ID_Direccion) WHERE ID_Docente='$C'");
        if(empty(mysqli_fetch_array($registros))==false){
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
      <br/><br/><br/>

        <form action="Bajas.php" method="post">
            <p align="center">
                <input type="radio" name="Numero" checked requiered value="<?php echo $C; ?>"><?php echo $C; ?> <br/>
                <input type="submit" name="BB" value="Dar de baja al Docente">
            </p>
        </form>
        
       <?php }
       else echo "<br/><br/><h3>Docente no encontrado</h3> <br/>";
       } ?>
        <?php
            if($_POST['BB']=="Dar de baja al Docente"){
                $N=$_POST['Numero'];
                mysqli_query($conexion, "DELETE FROM Alumnos WHERE ID_Alumno=$N") or die ("No se pudo eliminar el alumno correctamente.");
                echo "Se ha dado de baja correctamente";
            }
       ?>
    
    </div>
    </div>
</section>

</body>
</html>
