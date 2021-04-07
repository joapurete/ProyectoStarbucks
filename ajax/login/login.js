$(document).ready(function () {
    //Variables___________________________________________________________________________________________________________________________________________________
    let formLogin = $("#formLogin");
    //Eventos_____________________________________________________________________________________________________________________________________________________
    formLogin.on('submit', login);
    //Login_______________________________________________________________________________________________________________________________________________________
    function login(e) {
        e.preventDefault();
        var data = new FormData(this);
        let mail = data.get("mail").trim();
        let password = data.get("password").trim();
        if (mail.trim().length <= 0 ||
            password.trim().length <= 0) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Debe Completar Todos los Campos!",
            });
        } else {
            let redirect = $(this).attr('pag-redirect');
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
                    if (result == "notFound") {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Mail y/o Contraseña Incorrectas!",
                        });
                    }
                    if (result == "success") {
                        window.location.href = redirect;
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
//_________________________________________________________________________________________________________________________________________________________________