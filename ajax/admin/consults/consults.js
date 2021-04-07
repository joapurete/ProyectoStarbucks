$(document).ready(function () {
    //Variables___________________________________________________________________________________________________________________________________________________
    let btnDeleteConsult = $('.btn-delete-consult');
    //Eventos_____________________________________________________________________________________________________________________________________________________
    btnDeleteConsult.on("click", deleteConsult);
    //Solución Btn Elimnar_________________________________________________________________________________________________________________________________________
    $("#example1").bind("DOMSubtreeModified", function () {
        btnDeleteConsult = $('.btn-delete-consult');
        btnDeleteConsult.on("click", deleteConsult);
    });
    //Eliminar Consulta___________________________________________________________________________________________________________________________________________
    function deleteConsult(e) {
        e.preventDefault();
        let redirectBtn = $(this).attr("pag-redirect");
        Swal.fire({
            title: 'Estas seguro?',
            text: "Borraras esta Consulta!",
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
                let bool = '';
                if ($(this).attr('data-bool') == 'false') { bool = false; } else { bool = true; }
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
                        text: "No se Pudo eliminar esta Consulta!",
                    });
                } else {
                    let data = {
                        'id': id,
                        'action': 'deleteConsult'
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
                                    text: "Se ha Eliminado la Consulta!",
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
