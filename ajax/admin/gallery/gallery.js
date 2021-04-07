$(document).ready(function () {
    //Variables___________________________________________________________________________________________________________________________________________________
    let formNewImage = $("#formNewImage");
    let btnDeleteImage = $('.btn-delete-image');
    let inputImage = $("input#image");
    let previewImageLink = $(".preview-image")[1];
    let previewImage = $(".preview-image")[2];
    //Eventos_____________________________________________________________________________________________________________________________________________________
    formNewImage.on("submit", newImage);
    btnDeleteImage.on("click", deleteImage);
    //Solución Btn Elimnar_________________________________________________________________________________________________________________________________________
    $("#example1").bind("DOMSubtreeModified", function () {
        btnDeleteImage = $('.btn-delete-image');
        btnDeleteImage.on("click", deleteImage);
    });
    //Preview Imagen______________________________________________________________________________________________________________________________________________
    $(inputImage).on("change", function (e) {
        $(previewImageLink).attr('href', URL.createObjectURL(e.target.files[0]));
        $(previewImage).attr('src', URL.createObjectURL(e.target.files[0]));
    });
    //Agregar Imagen______________________________________________________________________________________________________________________________________________
    function newImage(e) {
        e.preventDefault();
        var data = new FormData(this);
        let image = data.get("image");
        if (image.name.trim().length <= 0) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Debe Seleccionar una Imagen!",
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
                            text: "Se ha Agregado una Foto a la Galeria!",
                        }).then((result) => {
                            location.reload();
                        });
                    }
                    if (result == "errorImage") {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Imagen no Valida!",
                        });
                    }
                    if (result == "largeImage") {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "La imagen deben ser inferior a 1MB!",
                        });
                    }
                    if (result == "errorInputs") {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Debe Completar Todos los Campos!",
                        });
                    }
                    if (result == "errorSaveImage") {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Error Subiendo Imagen!",
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
    //Eliminar Imagen_____________________________________________________________________________________________________________________________________________
    function deleteImage(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Estas seguro?',
            text: "Borraras esta Imagen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borrar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                let id = $(this).attr('data-id');
                let action = $(this).attr('data-action');
                let image = $(this).attr('data-image');
                tr = $(this).parent().parent().parent();
                if (
                    id == null ||
                    id.trim() == '' ||
                    action == null ||
                    action.trim() == ''
                ) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "No se pudo Eliminar la Imagen!",
                    });
                } else {
                    let data = {
                        'id': id,
                        'lastImage': image,
                        'action': 'deleteImage'
                    }
                    $.ajax({
                        type: 'POST',
                        url: action,
                        data: data,
                        dataType: "json",
                        success: function (response) {
                            let result = response['type'];
                            if (result == "success") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Genial",
                                    text: "Se ha Eliminado la Imagen",
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
