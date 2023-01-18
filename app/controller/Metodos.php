<?php
    // include "./app/config/Conexion.php";
    require "../config/Conexion.php";

    class Metodos{
        static function mostrarDatos(){
            // query de consulta
            $sql = "SELECT * FROM t_persona";

            // query de consulta, pero con una condicion en singno de interrogacion
            // $sql = "SELECT * FROM t_persona WHERE id_persona = ?";

            // preparando la consulta con la conexion
            $consulta = Conexion::conectar() -> prepare($sql);

            // preparando la consulta con la conexion y query incluido
            // $query = Conexion::conectar() -> prepare("SELECT * FROM t_persona WHERE id_persona = ?");

            // ejecutando consulta
            $consulta -> execute();

            // ejecutando la consulta con datos incluidos o enviados desde ajax
            // $query -> execute(1); ó
            // $query -> execute([$_POST['dato']]);

            // respuesta de la ejecucion de la consulta, simple, para php
            // $resultado = $query -> fetch();
            // $resultado = $query -> fetchAll();
            // el fetch simple, te trae los datos con la key en numero y texto, dupla de datos

            // $respuesta = array($respuesta);

            // respuesta de la consulta para ajax "PDO::FETCH_ASSOC" se evita la dupla de datos y te imprime solo las key de texto
            // echo $query -> fetch(PDO::FETCH_ASSOC);
            $resultado = $consulta -> fetchAll(PDO::FETCH_ASSOC);
            // echo json_encode($resultado);

            // finalizado de la consulta y cierre de la conexion
            // $query -> close();
            // al cerrar la consulta, no te permite seguir mandando tu informacion, tiene algun error
            // es mejor usar un default
            $consulta -> default;

            // return $_POST['funcion'];

            // impresion convertida a json para que el script js lo pueda usar
            // echo json_encode(['0','Hola']);
            // impresion en formato json, para que ajax lo reciba y se pueda trabajar la informacion
            echo json_encode($resultado);
        }
        static function agregarDatos(){
            $sql = "INSERT INTO t_persona (nombre,apellidoP,apellidoM,edad) VALUES(?,?,?,?)";
            $insercion = Conexion::conectar() -> prepare($sql);
            // al momento de hacer la ejecucion "execute", recibire un resultado booleano "true o false"
            if($insercion -> execute([$_POST['nombre'],$_POST['apellido_paterno'],$_POST['apellido_materno'],$_POST['edad']])){
                echo json_encode(['1','Se ha guardado con exito']);
            }else{
                echo json_encode(['0','No se ha guardado correctamente']);
            }
            $insercion -> default;
            // $resultado = $insercion -> execute([$_POST['nombre'],$_POST['apellido_paterno'],$_POST['apellido_materno'],$_POST['edad']]);
            // imprimire un dato true
            // echo json_encode([$resultado]);
        }
        static function precargarDatos(){
            $sql = "SELECT * FROM t_persona WHERE id_persona=?";
            $precarga = Conexion::conectar() -> prepare($sql);
            $precarga -> execute([$_POST['id']]);
            $resultado = $precarga -> fetch(PDO::FETCH_ASSOC);
            $precarga -> default;
            echo json_encode($resultado);
        }
        static function actualizarDatos(){
            $sql = "UPDATE t_persona SET nombre=?,apellidoP=?,apellidoM=?,edad=? WHERE id_persona=?";
            $actualizacion = Conexion::conectar() -> prepare($sql);
            if($actualizacion -> execute([$_POST['nombre_editar'],$_POST['apellido_paterno_editar'],$_POST['apellido_materno_editar'],$_POST['edad_editar'],$_POST['id_editar']])){
                echo json_encode(['1','Se actualizaron los datos con exito']);
            }else{
                echo json_encode(['0','No se actualizaron los datos']);
            }
            $actualizacion -> default;
        }
        static function eliminarDatos(){
            $sql = "DELETE FROM t_persona WHERE id_persona=?";
            $eliminacion = Conexion::conectar() -> prepare($sql);
            if($eliminacion -> execute([$_POST['id']])){
                echo json_encode(['1','Se eliminaron los datos con exito']);
            }else{
                echo json_encode(['0','Hubo un error al eliminar los datos']);
            }
            $eliminacion -> default;
        }
    }
    // Metodos::mostrarDatos();
    // echo json_encode(Metodos::mostrarDatos());
    // forma de llamar el metodo usando el dato "funcion" que se envia desde Ajax o fetch
    call_user_func('Metodos::'.$_POST['funcion']);
?>