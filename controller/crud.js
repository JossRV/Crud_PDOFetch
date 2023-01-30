// window.onload = () =>{
//     const loader = document.getElementById("contenido");
//     // var loader = document.getElementById("carga_container");
//     loader.style.visibility = 'hidden';
//     loader.style.opacity = 0;
// }
    
const caracter_mayus = (input) => {
    $(`[name=${input}]`).on('input', () => {
        $(`[name=${input}]`).val($(`[name=${input}]`).val().toUpperCase());
    });
}
const caracter_minus = (input) => {
    $(`[name=${input}]`).on('input', () => {
        $(`[name=${input}]`).val($(`[name=${input}]`).val().toLowerCase());
	});
}
const caracter_numeros = (input) => {
	$(`[name=${input}]`).on('input', () => {
        $(`[name=${input}]`).val($(`[name=${input}]`).val().replace(/[^0-9]/g, ''));
	});
}
const caracter_letras = (input) => {
    $(`[name=${input}]`).on('input', () => {
        $(`[name=${input}]`).val($(`[name=${input}]`).val().replace(/([^a-zA-Záéíóú\s])/i, ''));
	});
}
const caracter_varios = (input) => {
    $(`[name=${input}]`).on('input', () => {
        $(`[name=${input}]`).val($(`[name=${input}]`).val().replace(/([^A-Za-z0-9ñÑ])/g, ''));
	});
}
const primer_mayuscula = (input) => {
	$(`[name=${input}]`).on('input', ()=> {
		$(`[name=${input}]`).val($(`[name=${input}]`).val().charAt(0).toUpperCase() + $(`[name=${input}]`).val().slice(1));
	});
}
const limitar_valor = (input, inicio, fin, msj) => {
	return $(`[name=${input}]`).val() > inicio && $(`[name=${input}]`).val() < fin ? true : error(msj) ;
}
const longitud_campo = (input, inicio, fin, msj) => {
    let campo = $(`[name=${input}]`).val();
	return campo.length > inicio && campo.lenght < fin ? true : error(msj) ;
}
const longitud_campo_exacta = (input, longitud, msj) => {
	let campo = $(`[name=${input}]`).val();
	return campo.length == longitud ? true : error(msj) ;
}
const error = (msj) =>{
    swal({
        title: 'Error!',
        text: `${msj}`,
        icon: 'error',
        button: `Aceptar`,
    });
}
const exito = (msj) =>{
    swal({
        title: 'Correcto!',
        text: `${msj}`,
        icon: 'success',
        button: `Aceptar`,
    });
}
const vacios = (input) =>{
    let resultado = true;
    let expresion = /(?!(^$))/;
    input.map(nombre =>{
        resultado = expresion.test($(`#${nombre}`).val()) ? resultado : error(`no puedes dejar vacio el campo ${$(`#${nombre}`).attr('placeholder')}`), false;
        // usar la variable resultado, al momento de que vulevo a guardar el resultado 'true' en la variable se vuelve falso
        // resultado = expresion.test($(`#${nombre}`).val()) ? true : error(`no puedes dejar vacio el campo ${nombre.replace('_',' ')}`), false;
        // resultado = $(`#${nombre}`).val()!="" ? resultado : error(`no puedes dejar vacio el campo ${nombre.replace('_',' ')}`), false;
    });
    return resultado;
}

const inicio_loader = () =>{
    // $("#contenido2").css("visibility",'visible');
    $("#contenido2").css('visibility',"visible");
    $("#contenido2").css('opacity',1);
    // $("#contenido2").style.visibility = 'visible';
}

const fin_loader = () =>{
    // $("#contenido2").css("visibility",'hidden');
    $("#contenido2").css('visibility',"hidden");
    // $("#contenido2").style.visibility = 'hidden';
    // $("#contenido2").style.opacity = '0';
    // $("#contenido2").css("opacity",'0');
    $("#contenido2").css('opacity',0);
}

caracter_numeros('edad');
caracter_letras('nombre');
caracter_letras('apellido_paterno');
caracter_letras('apellido_materno');
caracter_numeros('edad_editar');
caracter_letras('nombre_editar');
caracter_letras('apellido_paterno_editar');
caracter_letras('apellido_materno_editar');
primer_mayuscula('nombre');
primer_mayuscula('apellido_paterno');
primer_mayuscula('apellido_materno');
primer_mayuscula('nombre_editar');
primer_mayuscula('apellido_paterno_editar');
primer_mayuscula('apellido_materno_editar');


const mostrarDatos = () =>{
    inicio_loader();
    // $.ajax({
        //     // url hacia donde quiero llegar o ir
        //     url: 'app/controller/Metodos.php',
        //     // especificando la peticion, post o get
        //     type: "post",
        //     // tipo de informacion qeu se espera de respuesta
        //     dataType: "json",
        //     // informacion a enviar
        //     data: "funcion=mostrarDatos",
        //     // data: {funcion: "mostrarDatos"},
        //     success:function(respuesta){
            //         // respuesta = respuesta.json();
            //         console.log(respuesta);
            
            //     }
    // });
    let datos=new FormData();
    datos.append("funcion","mostrarDatos");
    $("#tabla").DataTable().destroy();
    $("#contenido_tabla").html(``);
    let tabla = ``;
    
    // peticion hacia el archivo o link de API
    fetch('app/controller/Metodos.php',{
        // metodo de la peticion, envio de datos ya sea post o get
        method: "POST",
        // informacion a enviar
        body: datos
        // respuesta a recibir y parseo a json
    }).then(respuesta => respuesta.json())
    // respuesta recibida en json
    .then(respuesta=>{
        fin_loader();
        respuesta.map(dato => {
            let {id_persona,nombre,apellidoP,apellidoM,edad} = dato;
            tabla += `
            <tr>
            <td>${nombre}</td>
            <td>${apellidoP}</td>
            <td>${apellidoM}</td>
            <td>${edad}</td>
            <td><button class="btn btn-outline-warning" onclick="precargarDatos(${id_persona})" data-bs-toggle="modal" data-bs-target="#modalEditar">Editar</button></td>
            <td><button class="btn btn-outline-danger" onclick="eliminarDatos(${id_persona})">Eliminar</button></td>
            </tr>
            `;
        })
        $("#contenido_tabla").html(`${tabla}`);
        $("#tabla").DataTable();
        // atra el error en caso de que exista uno y lo muestra
    }).catch(error=>{
        fin_loader();
        console.log(`${error}`);
    });
}

mostrarDatos();


const agregarDatos = (datos) =>{
    inicio_loader();
    fetch('app/controller/Metodos.php',{
        method: "POST",
        body: datos
    }).then(respuesta => respuesta.json())
    .then(respuesta =>{
        fin_loader();
        // imprimiendo respuesta que recibí de la funcion php agregarDatos
        // console.log(`${respuesta}`);
        if(respuesta[0]==1){
            exito(respuesta[1]);
        }else if(respuesta[0]==0){
            error(respuesta[1]);
        }
    }).catch(error =>{
        console.log(`${error}`);
    })
    
    // console.log(datos);
    // resetea el formulario
    $("#frm_agregar")[0].reset();
    // cierra la modal
    $("#modalAgregar").modal('hide');
    mostrarDatos();
}

const precargarDatos = (id) =>{
    inicio_loader();
    // console.log(`Editar ${id}`);
    let datos = new FormData();
    datos.append('id',id);
    datos.append('funcion',"precargarDatos");
    fetch('app/controller/Metodos.php',{
        method: "POST",
        body: datos
    }).then(respuesta => respuesta.json())
    .then(respuesta =>{
        fin_loader();
        let {id_persona,nombre,apellidoP,apellidoM,edad} = respuesta;
        $("#id_editar").val(`${id_persona}`);
        $("#nombre_editar").val(`${nombre}`);
        $("#apellido_paterno_editar").val(`${apellidoP}`);
        $("#apellido_materno_editar").val(`${apellidoM}`);
        $("#edad_editar").val(`${edad}`);
        // console.log(respuesta);
    }).catch(error =>{
        console.log(`${error}`);
    });
}

const actualizarDatos = (datos) =>{
    // inicio_loader();
    fetch('app/controller/Metodos.php',{
        method: "POST",
        body: datos
    }).then(respuesta => respuesta.json())
    .then(respuesta =>{
        // fin_loader();
        if(respuesta[0]==1){
            exito(`${respuesta[1]}`);
        }else if(respuesta[0]==0){
            error(`${respuesta[1]}`);
        }
    }).catch(error =>{
        console.log(`${error}`);
    });
    $("#modalEditar").modal('hide');
    mostrarDatos();
}

const eliminarDatos = (id) =>{
    let datos = new FormData();
    datos.append('id',id);
    datos.append('funcion',"eliminarDatos");
    swal({
        title: "¿Desea eliminar el historial seleccionado?",
        text: "Una vez eliminado no se puede recuperar",
        icon: "warning",
        buttons: ["Cancelar","Aceptar"],
        dangerMode: true,
    }).then(eliminar =>{
        inicio_loader();
        if(eliminar){
            fetch('app/controller/Metodos.php',{
                method: "POST",
                body: datos
            }).then(respuesta => respuesta.json())
            .then(respuesta =>{
                fin_loader();
                if(respuesta[0]==1){
                    exito(respuesta[1]);
                }else{
                    error(respuesta[1]);
                }
            }).catch(error =>{
                console.log(`${error}`);
            });
        }else{
            // inicio_loader();
            exito(`Se ha conservado el historial`);
            // fin_loader();
        }
        mostrarDatos();
    });
    // console.log(`Eliminar ${id}`);
}

$("#frm_editar").on('submit', (e) =>{
    e.preventDefault();
    let campos = ['nombre_editar','apellido_paterno_editar','apellido_materno_editar','edad_editar'];
    if(vacios(campos)){
        let datos = new FormData($("#frm_editar")[0]);
        datos.append('funcion',"actualizarDatos");
        actualizarDatos(datos);
    }
});

$("#frm_agregar").on('submit',(e) =>{
    // previene que recargue la pagina cuando le das enter
    e.preventDefault();
    let campos = ['edad','apellido_materno','apellido_paterno','nombre']
    if(vacios(campos)){
        // crea los datos en formato json
        let datos = new FormData($("#frm_agregar")[0]);
        // se agrega un nuevo dato
        datos.append('funcion',"agregarDatos");
        // se envian los datos al metodo agregarDatos que pide los datos
        agregarDatos(datos); 
    }
});

console.log($("#nombre").attr('placeholder'));

// error('funciona el error xd');
// exito('funciona exito');