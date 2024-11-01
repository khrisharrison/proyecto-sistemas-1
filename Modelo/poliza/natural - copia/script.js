$(document).ready(function() {
    var personTable = $("#person1 tbody");

    // Obtener la lista de personas del servidor y mostrarla en la tabla
    function getPersonList() {
        $.ajax({
            url: "natural/get_person_list.php",
            method: "GET",
            data: {numero: numero},
            success: function(data) {
                personTable.html(data);
            }
        });
    }

    // Agregar función de click al botón de actualización
    $("#update1").click(function() {
        getPersonList();
    });

    // Obtener la lista de personas al cargar la página
    getPersonList();
});