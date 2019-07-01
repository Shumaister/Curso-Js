
function colaEfectosColumnaLateral() {
    capa = $("#columnaLateral");

    capa.queue(function () {
        el1 = $("#logo");
        el1.slideDown(1500);
        $(this).dequeue();
    });

    capa.delay(2000);
    capa.queue(function () {
        el1 = $("#titulo");
        el1.css({
            'font-weight': "bold",
            'color': "white"
        });
        el1.slideDown(1500);
        $(this).dequeue();
    });

    capa.delay(2000);
    capa.queue(function () {
        el1 = $("#logo2");
        el1.slideDown(1500);
        $(this).dequeue();
    });

    capa.delay(2000);
    capa.queue(function () {
        el1 = $("#lema");
        el1.css({
            'font-weight': "bold",
            'color': "red"
        });
        el1.slideDown(1500);
        $(this).dequeue();
    });
}

function efectoMensajePrincipal(){
    capa = $("#mensajePrincipal");
    
    capa.css({
        'float': "left",
        'background-color': "black",
        'width': "80%",
        'padding-left': "2%",
        'padding-right': "2%",
        'padding-top': "2%",
        'padding-bottom': "2%",
        'max-width': "800px"
    });
    
    capa.delay(2000);

    capa.fadeTo(1000, 0.8);

}

$(document).ready(function () {
    capa = $("#capaContenedora");

    capa.queue(function () {
        colaEfectosColumnaLateral();
        $(this).dequeue();
    });
    capa.queue(function () {
        efectoMensajePrincipal();
        $(this).dequeue();
    });
});
