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
    <title>Crud fetch y pdo</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row mb-5">
            <div class="col">
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalAgregar">Agregar Datos</button>
            </div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table" id="tabla">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Edad</th>
                            <th>Actualizar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="contenido_tabla">

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- modal agregar -->
    <div class="modal fade" tabindex="-1" id="modalAgregar">
        <form class="modal-dialog modal-dialog-centered" method="post" id="frm_agregar">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar datos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="nombre">Nombres</label>
                <input type="text" class="form-control mb-3" id="nombre" name="nombre">
                <label for="apellido_paterno">Apellido Paterno</label>
                <input type="text" class="form-control mb-3" id="apellido_paterno" name="apellido_paterno">
                <label for="apellido_materno">Apellido Materno</label>
                <input type="text" class="form-control mb-3" id="apellido_materno" name="apellido_materno">
                <label for="edad">Edad</label>
                <input type="text" class="form-control" id="edad" name="edad">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="btn_agregar">Guardar</button>
            </div>
            </div>
        </form>
    </div>

    <!-- modal editar -->
    <div class="modal fade" tabindex="-1" id="modalEditar">
        <form class="modal-dialog modal-dialog-centered" method="post" id="frm_editar">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar datos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="id_editar" name="id_editar" hidden>
                <label for="Nombre">Nombres</label>
                <input type="text" class="form-control mb-3" id="nombre_editar" name="nombre_editar">
                <label for="ApellidoP">Apellido Paterno</label>
                <input type="text" class="form-control mb-3" id="apellido_paterno_editar" name="apellido_paterno_editar">
                <label for="ApellidoM">Apellido Materno</label>
                <input type="text" class="form-control mb-3" id="apellido_materno_editar" name="apellido_materno_editar">
                <label for="Edad">Edad</label>
                <input type="text" class="form-control" id="edad_editar" name="edad_editar">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="btn_editar">Guardar</button>
            </div>
            </div>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="./controller/crud.js"></script>
</body>
</html>