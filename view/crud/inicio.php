<div class="container">
        <div class="row mb-5">
            <div class="col mt-5">
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
                <input type="text" class="form-control mb-3" id="nombre" name="nombre" placeholder="Nombre Completo de la vista x">
                <label for="apellido_paterno">Apellido Paterno</label>
                <input type="text" class="form-control mb-3" id="apellido_paterno" name="apellido_paterno" placeholder="Apellido Paterno">
                <label for="apellido_materno">Apellido Materno</label>
                <input type="text" class="form-control mb-3" id="apellido_materno" name="apellido_materno" placeholder="Apellido Materno">
                <label for="edad">Edad</label>
                <input type="text" class="form-control" id="edad" name="edad" placeholder="Edad">
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
                <input type="text" class="form-control mb-3" id="nombre_editar" name="nombre_editar" placeholder="nombre">
                <label for="ApellidoP">Apellido Paterno</label>
                <input type="text" class="form-control mb-3" id="apellido_paterno_editar" name="apellido_paterno_editar">
                <label for="ApellidoM">Apellido Materno</label>
                <input type="text" class="form-control mb-3" id="apellido_materno_editar" name="apellido_materno_editar">
                <label for="Edad">Edad</label>
                <input type="text" class="form-control" id="edad_editar" name="edad_editar" placeholder="edad">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="btn_editar">Guardar</button>
            </div>
            </div>
        </form>
    </div>