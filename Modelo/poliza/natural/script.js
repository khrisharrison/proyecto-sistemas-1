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





            // Agregar un controlador de eventos para el botón de eliminar
            $('#person1 tbody').on('click', '.btn-eliminar', function() {
                if (!confirm('¿Está seguro de que desea eliminar esta persona?')) {
                    return;
                }

                var cedula = $(this).data('cedula');
                var numero = $(this).data('numero');

                $.ajax({
                    url: 'natural/eliminar.php',
                    method: 'POST',
                    data: { cedula: cedula, numero: numero },
                    dataType: 'json',
  })
  .done(function(response) {
    alert('La persona se eliminó correctamente'); // Muestra un mensaje de éxito si la solicitud se completó correctamente
  })
  .fail(function(jqXHR, textStatus, errorThrown) {
    if (jqXHR.status >= 400 && jqXHR.status < 500) {
      alert('Error al eliminar la persona: ' + textStatus); // Muestra un mensaje de error si la solicitud AJAX se completó con un código de estado en el rango de 400 a 499
    } else {
      alert('Error al eliminar la persona'); // Muestra un mensaje de error si la solicitud AJAX no se completó correctamente o si el código de estado está fuera del rango de 400 a 499
    }
  });
});

});