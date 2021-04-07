$(document).ready(function () {
    //Variables___________________________________________________________________________________________________________________________________________________
    let formNewCategory = $("#formNewCategory");
    let formEditCategory = $("#formEditCategory");
    let btnDeleteCategory = $('.btn-delete-category');
    //Eventos_____________________________________________________________________________________________________________________________________________________
    formNewCategory.on('submit', newCategory);
    formEditCategory.on("submit", editCategory);
    btnDeleteCategory.on('click', deleteCategory);
    //Solución Btn Elimnar_________________________________________________________________________________________________________________________________________
    $("#example1").bind("DOMSubtreeModified", function () {
        btnDeleteCategory = $('.btn-delete-category');
        btnDeleteCategory.on("click", deleteCategory);
    });
    //Crear Categoria______________________________________________________________________________________________________________________________________________
    function newCategory(e) {
        e.preventDefault();
        var data = new FormData(this);
        let nombre = data.get("nombre").trim();
        if (
            nombre.trim().length <= 0
        ) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Debe Completar Todos los Campos!",
            });
        } else {
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
                            text: "Se ha Creado una Nueva Categoria!",
                        }).then((result) => {
                            location.reload();
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
    //Editar Categoria______________________________________________________________________________________________________________________________________________
    function editCategory(e) {
        e.preventDefault();
        var data = new FormData(this);
        let nombre = data.get("nombre").trim();
        if (
            nombre.trim().length <= 0
        ) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Debe Completar Todos los Campos!",
            });
        } else {
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
                            text: "Se ha Editado la Categoria!",
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
    //Eliminar Categoria____________________________________________________________________________________________________________________________________________
    function deleteCategory(e) {
        e.preventDefault();
        Swal.fire({
            title: "Estas seguro?",
            text: "Borraras esta Categoria!",
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
                        text: "No se pudo Eliminar el Usuario!",
                    });
                } else {
                    let data = {
                        id: id,
                        action: "deleteCategory",
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
                            if (result == "errorProduct") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: "Asegúrese que Ningún Producto Posea la Categoría Seleccionada!",
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