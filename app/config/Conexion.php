<?php
    // conectar a BD las hay 2 formas
    class Conexion{
        static function conectar(){
            try {
                $host = "localhost";
                $bd = "Crud_PDO";
                $user = "root";
                $pass = "";
                
                $conexion = new PDO("mysql:host=".$host.";dbname=".$bd,$user,$pass);
                $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conexion;
            } catch (PDOException $e) {
                echo "Error de conexion :" .$e;
            }
        }
    }