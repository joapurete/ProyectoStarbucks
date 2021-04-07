$(document).ready(function () {
    //Variables___________________________________________________________________________________________________________________________________________________
    let formNewRol = $("#formNewRol");
    let formEditRol = $("#formEditRol");
    let btnDeleteRol = $('.btn-delete-rol');
    //Eventos_____________________________________________________________________________________________________________________________________________________
    formNewRol.on('submit', newRol);
    formEditRol.on("submit", editRol);
    btnDeleteRol.on('click', deleteRol);
    //Crear Rol_____________________________________________________________________________________________________________________________________________________
    function newRol(e) {
        e.preventDefault();
        var data = new FormData(this);
        let nombre = data.get("nombre").trim();
        let nivel = data.get("nivel").trim();
        if (
            nombre.trim().length <= 0 ||
            nivel.trim().length <= 0
        ) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Debe Completar Todos los Campos!",
            });
        } else {
            if (nivel.trim().length <= 0) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "El Nivel de Acceso Ingresado no Existe!",
                });
                return;
            }
            $.ajax({
                type: $(this).attr("method"),
                url: $(this).attr("action"),
                data: data,
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    let result = response["type"];
                    if (result == "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Genial",
                            text: "Se ha Creado el Usuario!",
                        });
                    }
                    if (result == "errorInputs") {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Debe Completar Todos los Campos!",
                        });
                    }
                    if (result == "error") {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Hubo un error Inesperado! Vuelva mas Tarde",
                        });
                    }
                },
            });
        }
    }
    //Editar Rol_____________________________________________________________________________________________________________________________________________
    function editRol(e) {
        e.preventDefault();
        var data = new FormData(this);
        let nombre = data.get("nombre").trim();
        let nivel = data.get("nivel").trim();
        if (
            nombre.trim().length <= 0 ||
            nivel.trim().length <= 0
        ) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Debe Completar Todos los Campos!",
            });
        } else {
            if (nivel.trim().length <= 0) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "El Nivel de Acceso Ingresado no Existe!",
                });
                return;
            }
            $.ajax({
                url: $(this).attr("action"),
                type: $(this).attr("method"),
                data: data,
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    let result = response['type'];
                    if (result == "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Genial",
                            text: "Se ha Editado el Usuario!",
                        });
                    }
                    if (result == "errorInputs") {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Debe Completar Todos los Campos!",
                        });
                    }
                    if (result == "error") {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Hubo un error Inesperado! Vuelva mas Tarde",
                        });
                    }
                },
            });
        }
    }
    //Eliminar Rol____________________________________________________________________________________________________________________________________________
    function deleteRol(e) {
        e.preventDefault();
        Swal.fire({
            title: "Estas seguro?",
            text: "Borraras este Rol!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, borrar!",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                let id = $(this).attr("data-id");
                let action = $(this).attr("data-action");
                tr = $(this).parent().parent().parent();
                if (
                    id == null ||
                    id.trim() == "" ||
                    action == null ||
                    action.trim() == ""
                ) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "No se pudo Eliminar el Rol!",
                    });
                } else {
                    let data = {
                        id: id,
                        action: "deleteRol",
                    };
                    $.ajax({
                        type: "POST",
                        url: action,
                        data: data,
                        dataType: "json",
                        success: function (response) {
                            let result = response["type"];
                            if (result == "success") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Genial",
                                    text: "Se ha Eliminado el Usuario!",
                                }).then((result) => {
                                    $(tr).fadeOut(function () {
                                        $(this).remove();
                                    });
                                });
                            }
                            if (result == "errorInputs") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: "Debe Completar Todos los Campos!",
                                });
                            }
                            if (result == "errorUserRol") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: "Asegúrese que Ningún Usuario Posea el Rol Seleccionado!",
                                });
                            }
                            if (result == "error") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: "Hubo un error Inesperado! Vuelva mas Tarde",
                                });
                            }
                        },
                    });
                }
            }
        });
    }
});