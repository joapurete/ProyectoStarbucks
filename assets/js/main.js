$(document).ready(function () {
    //Variables___________________________________________________________________________________________________________________________________________________
    let btnLogout = $(".btnLogout");
    //Eventos_____________________________________________________________________________________________________________________________________________________

    //Logout______________________________________________________________________________________________________________________________________________________
    $(btnLogout).on("click", function (e) {
        e.preventDefault();
        Swal.fire({
            title: "Estas Seguro?",
            text: "Cerraras Sesion",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si",
            cancelButtonText: "No",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = $(this).attr('pag-redirect');
            }
        });
    });
});