<?php
    // require_once "./app/controller/Metodos.php";
    // require_once "./app/config/Conexion.php";

    // que es PDO
    /* 
        Objetos de Datos de PHP define una interfaz ligera para poder acceder a base de datos en PHP.

        - Es orientado a objetos
        - Trabaja con multiples base de datos
        - Contiene una capa de acceso a los datos
        - Seguridad/Sentecias preparadas
        - Usabilidad y Reusabilidad
        - excelente para el manejo de errores

    */
    
    // llamar el metodo para mostrar los datos
    // Metodos::mostrarDatos();
    // prueba de conexion
    // Conexion::conectar() ? "SMN" : "NEL"

    // variable que recibira los datos, el json_encode sirve para js
    // $datos = json_encode(Metodos::mostrarDatos());
    // variable que recibe los datos sin ningun tipo de parseo
    // $datos = Metodos::mostrarDatos();
    // en una etiqueta tabla, incluyes los dato ordenandolos, 
    // se usa foreach para recorrer los datos de la variable
    // foreach($datos as $key){
    //     echo $key['nombre']."<br>";
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="./public/css/carga.css">
    <title>Crud fetch y pdo</title>
</head>
<body>
    <?php require_once './view/carga.php' ?>
    <?php require_once './view/crud/inicio.php'?>


    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="./controller/crud.js"></script>
</body>
</html>