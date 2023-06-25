<?php
    function conectar(){
        $usuario = "root";
        $password = "";
        $servidor = "localhost";
        $basededatos = "CONTROL";
        // creación de la conexión a la base de datos con mysql_connect()
        $conexion = mysqli_connect( $servidor, $usuario, $password ,$basededatos) or die ("No se ha podido conectar al servidor de Base de datos");
        return $conexion;
    }
?>