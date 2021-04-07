$(document).ready(function () {
    //Variables___________________________________________________________________________________________________________________________________________________
    let formNewUser = $("#formNewUser");
    let formEditUser = $("#formEditUser");
    let formEditUserPass = $("#formEditUserPass");
    let btnDeleteUser = $('.btn-delete-user');
    let inputImage = $("input#image");
    let previewImageLink = $(".preview-image")[1];
    let previewImage = $(".preview-image")[2];
    //Eventos_____________________________________________________________________________________________________________________________________________________
    formNewUser.on('submit', newUser);
    formEditUser.on("submit", editUser);
    formEditUserPass.on("submit", editUserPass);
    btnDeleteUser.on('click', deleteUser);
    //Solución Btn Elimnar_________________________________________________________________________________________________________________________________________
    $("#example1").bind("DOMSubtreeModified", function () {
        btnDeleteUser = $('.btn-delete-user');
        btnDeleteUser.on("click", deleteUser);
    });
    //Preview Imagen______________________________________________________________________________________________________________________________________________
    $(inputImage).on("change", function (e) {
        $(previewImageLink).attr('href', URL.createObjectURL(e.target.files[0]));
        $(previewImage).attr('src', URL.createObjectURL(e.target.files[0]));
    });
    //Crear Usuario_______________________________________________________________________________________________________________________________________________
    function newUser(e) {
        e.preventDefault();
        var data = new FormData(this);
        let nombre = data.get("nombre").trim();
        let apellido = data.get("apellido").trim();
        let rol = data.get("rol").trim();
        let mail = data.get("mail").trim();
        let tel = data.get("tel").trim();
        let password = data.get("password").trim();
        let verifPassword = data.get("verifPassword").trim();
        if (
            nombre.trim().length <= 0 ||
            apellido.trim().length <= 0 ||
            mail.trim().length <= 0 ||
            password.trim().length <= 0 ||
            verifPassword.trim().length <= 0
        ) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Debe Completar Todos los Campos!",
            });
        } else {
            if (rol.trim().length <= 0) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "El Rol Ingresado no Existe!",
                });
                return;
            }
            if (password.length < 6) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "La contraseña debe ser de minimo 6 Caracteres!",
                });
                return;
            } else if (password != verifPassword) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Las contraseñas no Coinciden!",
                });
                return;
            } else if (tel.trim().length >= 1) {
                if (tel.length < 8) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Digite un Número de Teléfono Válido!",
                    });
                    return;
                } else {
                    const regex = /^[0-9]*$/;
                    const onlyNumbers = regex.test(tel);
                    if (onlyNumbers == false) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Digite un Número de Teléfono Válido!",
                        });
                        return;
                    }
                }
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
    //Editar Usuario_____________________________________________________________________________________________________________________________________________
    function editUser(e) {
        e.preventDefault();
        var data = new FormData(this);
        let nombre = data.get("nombre").trim();
        let apellido = data.get("apellido").trim();
        let rol = data.get("rol").trim();
        let mail = data.get("mail").trim();
        let tel = data.get("tel").trim();
        if (
            nombre.trim().length <= 0 ||
            apellido.trim().length <= 0 ||
            rol.trim().length <= 0 ||
            mail.trim().length <= 0
        ) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Debe Completar Todos los Campos!",
            });
        } else {
            if (tel.trim().length >= 1) {
                if (tel.length < 8) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Digite un Número de Teléfono Válido!",
                    });
                    return;
                } else {
                    const regex = /^[0-9]*$/;
                    const onlyNumbers = regex.test(tel);
                    if (onlyNumbers == false) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Digite un Número de Teléfono Válido!",
                        });
                        return;
                    }
                }
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
                    if (result == "errorRol") {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "El Rol Ingresado no Existe!",
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
    //Editar Password_____________________________________________________________________________________________________________________________________________
    function editUserPass(e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        let password = data[0].value.trim();
        let verifPassword = data[1].value.trim();
        if (
            password.trim().length <= 0 ||
            verifPassword.trim().length <= 0
        ) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Debe Completar Todos los Campos!",
            });
        } else {
            if (password.length < 6) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "La contraseña debe ser de minimo 6 Caracteres!",
                });
                return;
            } else if (password != verifPassword) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Las contraseñas no Coinciden!",
                });
                return;
            }
            $.ajax({
                url: $(this).attr("action"),
                type: $(this).attr("method"),
                data: data,
                dataType: "json",
                success: function (response) {
                    let result = response['type'];
                    if (result == "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Genial",
                            text: "Se ha Cambiado la Contraseña!",
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
    //Eliminar Usuario____________________________________________________________________________________________________________________________________________
    function deleteUser(e) {
        e.preventDefault();
        let redirectBtn = $(this).attr("pag-redirect");
        Swal.fire({
            title: "Estas seguro?",
            text: "Borraras este Usuario!",
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
                        text: "No se pudo Eliminar el Usuario!",
                    });
                } else {
                    let data = {
                        id: id,
                        imagenAntigua: image,
                        action: "delete",
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
//_________________________________________________________________________________________________________________________________________________________________