
function colaEfectos() {
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
$(document).ready(function () {
    colaEfectos();
});
