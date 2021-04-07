$(document).ready(function () {
    //Variables___________________________________________________________________________________________________________________________________________________
    let formEditProfile = $("#formEditProfile");
    let formEditPass = $('#formEditPass');
    let inputImage = $("input#image");
    let previewImage = $(".preview-image");
    //Eventos_____________________________________________________________________________________________________________________________________________________
    formEditProfile.on("submit", editProfile);
    formEditPass.on('submit', editPass);
    //Preview Imagen______________________________________________________________________________________________________________________________________________
    $(inputImage).on("change", function (e) {
        $(previewImage).attr(
            "src",
            URL.createObjectURL(e.target.files[0])
        );
    });
    //Editar Perfil______________________________________________________________________________________________________________________________________________
    function editProfile(e) {
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
                type: $(this).attr("method"),
                url: $(this).attr("action"),
                data: data,
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    let result = response['type'];
                    /*                 let info = result['result'];
                                    alert(info); */
                    if (result == "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Genial",
                            text: "Se ha Editado el Perfil!",
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
    //Editar Pass_________________________________________________________________________________________________________________________________________________
    function editPass(e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        let password = data[0].value.trim();
        let newPassword = data[1].value.trim();
        let verifPassword = data[2].value.trim();
        let realPassword = data[3].value.trim();
        if (
            password.trim().length <= 0 ||
            newPassword.trim().length <= 0 ||
            verifPassword.trim().length <= 0 ||
            realPassword.trim().length <= 0
        ) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Debe Completar Todos los Campos!",
            });
        } else {
            if (newPassword.length < 6) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "La contraseña debe ser de minimo 6 Caracteres!",
                });
                return;
            } else if (newPassword != verifPassword) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Las contraseñas no Coinciden!",
                });
                return;
            }
            $.ajax({
                type: $(this).attr("method"),
                url: $(this).attr("action"),
                data: data,
                dataType: "json",
                success: function (response) {
                    let result = response["type"];
                    if (result == "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Genial",
                            text: "Se ha Cambiado su Contraseña!",
                        }).then((result) => {
                            location.reload();
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
                    if (result == "errorValidate") {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "La contraseña antigua que especificaste es incorrecta. Vuelve a Intentarlo!",
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
//__________________________________________________________________________________________________________________________________________________________________