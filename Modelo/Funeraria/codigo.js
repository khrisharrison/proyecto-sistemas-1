var searchBar3 = document.getElementById("search-bar3");
var searchResults3 = document.getElementById("searchResults3");
var saveButton3 = document.getElementById("save-button3");

searchBar3.addEventListener("input", function() {
    var query = searchBar3.value;
    if (query.length >= 1) {
        var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
         searchResults3.innerHTML = this.responseText;
    }
};

        xhttp.open("GET", "funeraria/buscar.php?q=" + query, true);
        xhttp.send();
    } else {
        searchResults3.innerHTML = "";
    }
});


saveButton3.addEventListener("click", function() {
    var cedula = searchBar3.value;
    var num = numero;
    if (cedula.length > 0) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);
                if (response.status == "error") {
                    alert(response.message);
                } else {
                    var confirmar = confirm("¿Desea guardar la cédula?");
                    if (confirmar) {
                        var xhttp2 = new XMLHttpRequest();
                        xhttp2.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                alert("Cédula guardada en la base de datos");
                            }
                        };
                        xhttp2.open("POST", "funeraria/guardar.php", true);
                        xhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhttp2.send("cedula=" + cedula + "&numero=" + num);
                    }
                }
            }
        };
        xhttp.open("POST", "funeraria/validar.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("cedula=" + cedula + "&numero=" + num);
    } else {
        alert("Debe ingresar una cédula válida");
    }
});
