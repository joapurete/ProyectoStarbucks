$(document).ready(function () {
    //Variables___________________________________________________________________________________________________________________________________________________
    let btnLogout = $(".btnLogout");
    let btnHamburger = $(".hamburguer");
    let navbar = $(".navbar");
    let nav = $(".nav");
    //Eventos_____________________________________________________________________________________________________________________________________________________

    //Borde Nav (Scroll)
    $(window).scroll(function () {
        if ($(window).scrollTop()) {
            $(nav).addClass("nav-line");
        } else {
            $(nav).removeClass("nav-line");
        }
    });
    //Linea Hover Nav_____________________________________________________________________________________________________________________________________________
    var myMagicLine = new magicLine(document.querySelectorAll(".navbar"),
        {
            mode: 'line',
            animationCallback: function (el, params) {
                anime({
                    targets: el,
                    left: params.left,
                    top: params.top,
                    width: params.width,
                    height: params.height
                });
            }
        });
    myMagicLine.init();
    //Type Text (Hero Index)______________________________________________________________________________________________________________________________________
    new TypeIt("#type1", {
        speed: 120,
        loop: true,
        waitUntilVisible: true,
    })
        .type("Starbucks", { delay: 400 })
        .pause(500)
        .delete(9)
        .type("Cofee", { delay: 400 })
        .pause(500)
        .delete(9)
        .go();
    //Menu Hamburguesa___________________________________________________________________________________________________________________________________________
    $(btnHamburger).click(function () {
        $(btnHamburger).toggleClass("active");
        $(navbar).toggleClass("responsive");
    });
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