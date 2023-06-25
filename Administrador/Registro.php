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
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center">
          <p><h2 align="center">Registrado en el sistema<br /></h2></p>
              <?php
            if($_POST['boton']=="Registrar Alumno"){
            $TEL=$_POST['telefono'];
            $NOM=$_POST['nom'];     $RG="SI";
            $AP=$_POST['apelp'];     
            $AM=$_POST['apelm'];     $DOM=$_POST['Domicilio'];
            $EC=$_POST['civil'];     $FN=$_POST['fecha'];
            $EMAIL=$_POST['email'];  $FI=getdate();
            $FIF=$FI['year']."-".$FI['mon']."-".$FI['mday'];
            $GEN=$_POST['Genero'];    $ES=$_POST['Estado'];
            $CAR=$_POST['carrera'];   $Mun=$_POST['Municipio'];
            $C=0; $contador=0;
            $PAS=rand(100,999);
            $ID=$FI['year']."150480".$PAS;   
            
            $direccion=mysqli_query($conexion,"SELECT *  FROM Direcciones");
            while($registro = mysqli_fetch_array($direccion)){
                if($registro['Estado']==$ES && $registro['Municipio']==$Mun){
                    $C=$registro['ID_Direccion'];
                }
                $contador=$contador+1;
                } 
                if($C==0) {
                    $C=$contador+1;
                    mysqli_query($conexion,"INSERT INTO Direcciones VALUES (".$C.",'México','".$ES."','".$Mun."',".$_POST['cod'].")") or die ("Error al procesar la solicitud de direccion");
                }
                
                mysqli_query($conexion,"insert into Alumnos(ID_Alumno,NombreAlumno,ApellidoPA,ApellidoMA,ID_Direccion,
                TelefonoA,EmailA,RegularA,EstadoCivilA,ID_Grupo,ID_Carrera,EstadoA,DomicilioA,GeneroA,FechaNacimiento,FechaIngresoA,ContraseñaA)
                values(".$ID.",'".$NOM."','".$AP."','".$AM."',".$C.",'".$TEL."','".$EMAIL."','".$RG."','".$EC."','EN ESPERA','".$CAR."','Activo','".$DOM."','".$GEN."','".$FN."','".$FIF."','".$PAS."')") or die ("Error al procesar la solicitud");
             
             $registros=mysqli_query($conexion,"SELECT *  FROM Alumnos INNER JOIN Carreras ON(Carreras.ID_Carrera=Alumnos.ID_Carrera) INNER JOIN Direcciones ON(Direcciones.ID_Direccion=Alumnos.ID_Direccion) INNER JOIN Grupos ON(Grupos.ID_Grupo=Alumnos.ID_Grupo) WHERE ID_Alumno='$ID'");
              echo "<br/><br/><br/><br/>";
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
                    echo "<tr>";
                        echo "<td>Genero: </td>";
                        echo "<td>".$registro['GeneroA']."</td>";
                        echo "<td>Password:</td>";
                        echo "<td> ".$registro['ContraseñaA']."</td>";
        
                    echo "</tr>";
            }
            echo "</table>";
            echo "<br/><br/><br/><br/><h4>Numero de control: ".$ID." </h4>";
            $contador=0;
          }
          if($_POST['boton']=="Registrar Docente"){
           $TEL=$_POST['telefono'];
            $NOM=$_POST['nom'];     $ES=$_POST['Estudios'];
            $AP=$_POST['apelp'];     
            $AM=$_POST['apelm'];     $DOM=$_POST['Domicilio'];
            $EC=$_POST['civil'];     $FN=$_POST['fecha'];
            $EMAIL=$_POST['email'];  $FI=getdate();
            $FIF=$FI['year']."-".$FI['mon']."-".$FI['mday'];
            $GEN=$_POST['Genero'];    $ES=$_POST['Estado'];
            $CAR=$_POST['jefe'];   $Mun=$_POST['Municipio'];
            $C=0; $contador=0;
            $PAS=rand(100,999);
            $ID=$FI['year']."450180".$PAS;   
            
           
            $direccion=mysqli_query($conexion,"SELECT *  FROM Direcciones");
            while($registro = mysqli_fetch_array($direccion)){
                if($registro['Estado']==$ES && $registro['Municipio']==$Mun){
                    $C=$registro['ID_Direccion'];
                }
                $contador=$contador+1;
                } 
                if($C==0) {
                    $C=$contador+1;
                    mysqli_query($conexion,"INSERT INTO Direcciones VALUES (".$C.",'México','".$ES."','".$Mun."',".$_POST['cod'].")") or die ("Error al procesar la solicitud");
                }
            mysqli_query($conexion,"INSERT INTO Docentes (ID_Docente, NombreD, ApellidoPD,ApellidoMD, ID_Direccion, TelefonoD,EmailD,EstadoCivilD,EstudiosD, ID_Jefe, DomicilioD, GeneroD ,FechaNacimientoD,FechaIngresoD,ContraseñaD) 
            VALUES(".$ID.",'".$NOM."','".$AP."','".$AM."',".$C.",".$TEL.",'".$EMAIL."','".$EC."','".$ES."',".$CAR.",'".$DOM."','".$GEN."','".$FN."','".$FIF."','".$PAS."')")or die ("Error al procesar la solicitud");
            
            $registros=mysqli_query($conexion,"SELECT *  FROM Docentes INNER JOIN JefeDivision ON(JefeDivision.ID_Jefe=Docentes.ID_Jefe) INNER JOIN Direcciones ON(Direcciones.ID_Direccion=Docentes.ID_Direccion) WHERE ID_Docente='$ID'");
              echo "<br/><br/><br/><br/>";
            echo "<table width=100% height=40% border=1><tr>";
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
                        echo "<td>Estado Civil: </td>";
                        echo "<td>".$registro['EstadoCivilD']."</td>";
                        echo "<td>Password:</td>";
                        echo "<td> ".$registro['ContraseñaD']."</td>";
                    echo "</tr>";
            }
            echo "</table>";
             echo "<br/><br/><br/><br/><h4>Numero de control: ".$ID." </h4>";
            $contador=0;
          
          } 
          if($_POST['boton']=="Registrar Calificacion"){
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
            
          } 
        ?>
        <?php
        if($_POST['boton']=="Registrar Evento"){
            $F=$_POST['Fecha'];
            $H=$_POST['Hora'];
            $D=$_POST['Descripcion'];
            $cont=1;
            $Reg=mysqli_query($conexion,"SELECT * FROM Eventos")or die ("Error al procesar la solicitud");
            while($r = mysqli_fetch_array($Reg)){
                $cont=$cont+1;
            }
           mysqli_query($conexion,"INSERT INTO Eventos VALUES(".$cont.",'".$F."','".$H."','".$D."')")or die ("Error al procesar la solicitud");
           
           $registros=mysqli_query($conexion," SELECT * FROM Eventos WHERE Descripcion='".$D."'");
           echo "<table width=100% border=1>";
            echo "<tr align=center><td>Fecha</td><td>Hora</td><td>Descripcion</td> </tr>";
            while($reg= mysqli_fetch_array($registros)){
            echo "<tr>";
            echo "<td>".$reg['Fecha']."</td>";
            echo "<td>".$reg['Hora']."</td>";
            echo "<td>".$reg['Descripcion']."</td>";
       echo "</tr>";
    }
    echo " </table>";
            
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
