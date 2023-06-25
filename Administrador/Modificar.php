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
        <p><h2  align="center">Actualizar datos</h2><br /></p>
        
      
        <form action="Modificar.php" method="post">
           <p align="center">
         Buscar: 
        <select name="Opcion">
                <option>Alumno</option>
                <option>Docente</option>
                </select>
                &nbsp;&nbsp;
            <input type="text" name="codigo" placeholder="Numero de control">
            <input type="submit" name="name" value="Buscar">
        </p>
        </form>
        <form action="Actualizar.php" method="post">
          <?php
        $O=$_POST["Opcion"];
        if ($O=="Alumno"){
       
        $C=$_POST["codigo"];
        $Cal=mysqli_query($conexion,"SELECT *  FROM Calificacion INNER JOIN Materias ON (Calificacion.ID_Materia=Materias.ID_Materia)WHERE ID_Alumno=$C ORDER BY SemestreC");
        $registros=mysqli_query($conexion,"SELECT *  FROM Alumnos INNER JOIN Carreras ON(Carreras.ID_Carrera=Alumnos.ID_Carrera) INNER JOIN Direcciones ON(Direcciones.ID_Direccion=Alumnos.ID_Direccion) INNER JOIN Grupos ON(Grupos.ID_Grupo=Alumnos.ID_Grupo) WHERE ID_Alumno='$C'");
        echo "<table width=100% border=1>";
            while($registro = mysqli_fetch_array($registros)){
            ?>
            Numero de control: <input type="text" name="codigo" value="<?php echo $registro['ID_Alumno']; ?>" readonly>
                <tr align="center">
                        <td>Nombre completo: </td>
                        <td>
                            <input type="text" name="NAN" value="<?php echo $registro['NombreAlumno']; ?>">
                            <input type="text" name="APN" value="<?php echo $registro['ApellidoPA']; ?>">
                            <input type="text" name="AMN" value="<?php echo $registro['ApellidoMA']; ?>">
                        </td>
                        <td> Fecha de Nacimiento: </td>;
                        <td><input type="text" name="FNN" value="<?php echo $registro['FechaNacimiento']; ?>" readonly> </td>
                    </tr>
                    <tr align="center">
                        <td>Fecha de ingreso: </td>
                        <?php echo "<td>".$registro['FechaIngresoA']."</td>"; ?>
                        <td>Carrera: </td>
                        <td><input type="text" name="CN" value="<?php echo $registro['NombreCarrera']; ?>" readonly></td>
                    </tr>
                     <tr align="center">
                        <td>Telefono: </td>
                        <td><input type="text" name="TN" value="<?php echo $registro['TelefonoA']; ?>"></td>
                        <td>Email: </td>
                        <td><input type="text" name="EMN" value="<?php echo $registro['EmailA']; ?>"></td>
                    </tr> 
                     <tr align="center">
                        <td>Regular: </td>
                        <td><input type="text" name="RN" value="<?php echo $registro['RegularA']; ?>"></td>
                        <td>Estado: </td>
                        <td><input type="text" name="EAN" value="<?php echo $registro['EstadoA']; ?>"></td>
                    </tr>
                    <tr align="center">
                        <td>Direccion: </td>
                        <td><input type="text" name="PN" value="<?php echo $registro['Pais']; ?>"></td>
                        <td><input type="text" name="EN" value="<?php echo $registro['Estado']; ?>"></td>
                        <td><input type="text" name="MN" value="<?php echo $registro['Municipio']; ?>"> <input type="text" name="DM" value="<?php echo $registro['DomicilioA']; ?>"> </td>
                    </tr>
                    <tr align="center">
                        <td>Semestre:<input type="text" name="SN" value="<?php echo $registro['Semestre']; ?>"></td>
                        <td>Grupo:<input type="text" name="GN" value="<?php echo $registro['ID_Grupo']; ?>"></td>
                        <td>Turno:<input type="text" name="TRN" value="<?php echo $registro['Turno']; ?>"></td>
                        <td>Estado Civil:   <input type="text" name="EC" value="<?php echo $registro['EstadoCivilA']; ?>"></td>
                    </tr>
                    <?php
           }
            
            echo "</table>";?>
            </br></br>
                                        <p align="center"><input type="submit" name="boton" value="Modificar Alumno"> </p>
       <?php
            
        }?>
        </form>
        <form action="Actualizar.php" method="post">
    <?php
         if ($O=="Docente"){
          $C=$_POST["codigo"];
        $Cal=mysqli_query($conexion,"SELECT DISTINCT Calificacion.ID_Materia, Materias.NombreM  FROM Calificacion INNER JOIN Materias ON (Calificacion.ID_Materia=Materias.ID_Materia)WHERE ID_Docente=$C");
        $registros=mysqli_query($conexion,"SELECT *  FROM Docentes INNER JOIN JefeDivision ON(JefeDivision.ID_Jefe=Docentes.ID_Jefe) INNER JOIN Direcciones ON(Direcciones.ID_Direccion=Docentes.ID_Direccion) WHERE ID_Docente='$C'");
        echo "<table width=100% border=1><tr>";
       ?> Numero de control: <input type="text" name="codigoD" value="<?php echo $C ?>" readonly> <?php
        while($registro = mysqli_fetch_array($registros)){
            ?>
            
            <tr align="center">
                        <td>Nombre completo: </td>
                        <td>
                            <input type="text" name="NAN" value="<?php echo $registro['NombreD']; ?>"><br/>
                            <input type="text" name="APN" value="<?php echo $registro['ApellidoPD']; ?>"><br/>
                            <input type="text" name="AMPN" value="<?php echo $registro['ApellidoMD']; ?>"><br/>
                        </td>
                        <td> Fecha de Nacimiento: </td>;
                        <td><input type="text" name="F" value="<?php echo $registro['FechaNacimientoD']; ?>" readonly> </td>
                    </tr>
                    <tr align="center">
                        <td>Fecha de ingreso: </td>
                        <?php echo "<td>".$registro['FechaIngresoD']."</td>"; ?>
                        <td>Coordinador: </td>
                        <td><input type="text" name="JF" value="<?php echo $registro['NombreJefe']; ?>" readonly></td>
                    </tr>
                     <tr align="center">
                        <td>Telefono: </td>
                        <td><input type="text" name="TN" value="<?php echo $registro['TelefonoD']; ?>"></td>
                        <td>Email: </td>
                        <td><input type="text" name="EMN" value="<?php echo $registro['EmailD']; ?>"></td>
                    </tr> 
                     <tr align="center">
                        <td>Estudios: </td>
                        <td><input type="text" name="EST" value="<?php echo $registro['EstudiosD']; ?>"></td>
                        <td>Genero: </td>
                        <td><input type="text" name="GN" value="<?php echo $registro['GeneroD']; ?>"></td>
                    </tr>
                    <tr align="center">
                        <td>Direccion: </td>
                        <td><input type="text" name="PA" value="<?php echo $registro['Pais']; ?>"></td>
                        <td><input type="text" name="ES" value="<?php echo $registro['Estado']; ?>"></td>
                        <td><input type="text" name="MUN" value="<?php echo $registro['Municipio']; ?>"> <input type="text" name="codigo" value="<?php echo $registro['DomicilioD']; ?>"> </td>
                    </tr>
                    <tr align="center">
                        <td>Estado Civil:   <input type="text" name="EC" placeholder="<?php echo $registro['EstadoCivilD']; ?>"></td>
                    </tr>
                    <?php
           }
            ?>
            </table>
            </br></br> <p align="center"><input type="submit" name="boton" value="Modificar Docente"> </p>
            </form>
    <?php } ?>
    
    
    </div>
    </div>
</section>

</body>
</html>
