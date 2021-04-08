$(document).ready(function () {
    //Variables___________________________________________________________________________________________________________________________________________________
    let formNewProduct = $("#formNewProduct");
    let formEditProduct = $("#formEditProduct");
    let btnDeleteProduct = $('.btn-delete-product');
    let inputImage = $("input#image");
    let inputSecondaryImage = $("input#secondaryImage");
    let previewImageLink = $(".preview-image")[1];
    let previewImage = $(".preview-image")[2];
    let previewSecondaryImageLink = $(".preview-image")[3];
    let previewSecondaryImage = $(".preview-image")[4];
    //Eventos_____________________________________________________________________________________________________________________________________________________
    formNewProduct.on('submit', newProduct);
    formEditProduct.on("submit", editProduct);
    btnDeleteProduct.on('click', deleteProduct);
    //Solución Btn Elimnar_________________________________________________________________________________________________________________________________________
    $("#example1").bind("DOMSubtreeModified", function () {
        btnDeleteProduct = $('.btn-delete-product');
        btnDeleteProduct.on("click", deleteProduct);
    });
    //Preview Imagen______________________________________________________________________________________________________________________________________________
    $(inputImage).on("change", function (e) {
        $(previewImageLink).attr('href', URL.createObjectURL(e.target.files[0]));
        $(previewImage).attr('src', URL.createObjectURL(e.target.files[0]));
    });
    $(inputSecondaryImage).on("change", function (e) {
        $(previewSecondaryImageLink).attr('href', URL.createObjectURL(e.target.files[0]));
        $(previewSecondaryImage).attr('src', URL.createObjectURL(e.target.files[0]));
    });
    //Crear Producto_______________________________________________________________________________________________________________________________________________
    function newProduct(e) {
        e.preventDefault();
        var data = new FormData(this);
        let nombre = data.get("nombre").trim();
        let categoria = data.get("categoria").trim();
        let precio = data.get("precio").trim();
        let stock = data.get("stock").trim();
        let image = data.get("image");
        if (
            nombre.trim().length <= 0 ||
            categoria.trim().length <= 0 ||
            precio.trim().length <= 0 ||
            stock.trim().length <= 0 ||
            image.length <= 0
        ) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Debe Completar Todos los Campos!",
            });
        } else {
            const regex = /^[0-9]*$/;
            const onlyNumbers = regex.test(precio);
            if (onlyNumbers == false) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Digite un Precio Válido!",
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
                            text: "Se ha Creado el Producto!",
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
    //Editar Producto_______________________________________________________________________________________________________________________________________________
    function editProduct(e) {
        e.preventDefault();
        var data = new FormData(this);
        let nombre = data.get("nombre").trim();
        let categoria = data.get("categoria").trim();
        let precio = data.get("precio").trim();
        let stock = data.get("stock").trim();
        if (
            nombre.trim().length <= 0 ||
            categoria.trim().length <= 0 ||
            precio.trim().length <= 0 ||
            stock.trim().length <= 0
        ) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Debe Completar Todos los Campos!",
            });
        } else {
            const regex = /^[0-9]*$/;
            const onlyNumbers = regex.test(precio);
            if (onlyNumbers == false) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Digite un Precio Válido!",
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
                            text: "Se ha Creado el Producto!",
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
    //Eliminar Producto________________________________________________________________________________________________________________________________________________
    function deleteProduct(e) {
        e.preventDefault();
        let redirectBtn = $(this).attr("pag-redirect");
        Swal.fire({
            title: "Estas seguro?",
            text: "Borraras este Producto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, borrar!",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                let id = $(this).attr("data-id");
                let image = $(this).attr("data-image");
                let secondaryImage = $(this).attr("data-secondaryImage");
                let action = $(this).attr("data-action");
                let bool = '';
                if ($(this).attr('data-bool') == 'false') { bool = false; } else { bool = true; }
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
                        text: "No se pudo Eliminar el Producto!",
                    });
                } else {
                    let data = {
                        id: id,
                        lastImage: image,
                        lastSecondaryImage: secondaryImage,
                        action: "deleteProduct",
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
                                    text: "Se ha Eliminado el Producto!",
                                }).then((result) => {
                                    if (bool != false) {
                                        $(tr).fadeOut(function () {
                                            $(this).remove();
                                        });
                                    } else {
                                        window.location.href = redirectBtn;
                                    }
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