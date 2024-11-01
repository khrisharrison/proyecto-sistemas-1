var searchBar = document.getElementById("search-bar");
var searchResults = document.getElementById("search-results");
var saveButton = document.getElementById("save-button");

searchBar.addEventListener("input", function() {
    var query = searchBar.value;
    if (query.length >= 6) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                searchResults.innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "cementerio/buscar.php?q=" + query, true);
        xhttp.send();
    } else {
        searchResults.innerHTML = "";
    }
});

saveButton.addEventListener("click", function() {
    var cedula = searchBar.value;
    var num = numero;
    if (cedula.length > 0) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);
                if (response.status == "error") {
                    alert(response.message);
                } else {
                    var confirmar = confirm("¿Desea guardar el Rif?");
                    if (confirmar) {
                        var xhttp2 = new XMLHttpRequest();
                        xhttp2.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                alert("Rif guardada en la base de datos");
                            }
                        };
                        xhttp2.open("POST", "cementerio/guardar.php", true);
                        xhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhttp2.send("cedula=" + cedula + "&numero=" + num);
                    }
                }
            }
        };
        xhttp.open("POST", "cementerio/validar.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("cedula=" + cedula + "&numero=" + num);
    } else {
        alert("Debe ingresar un Rif válida");
    }
});



var searchBar1 = document.getElementById("search-bar1");
var searchResults1 = document.getElementById("searchResults1");
var saveButton1 = document.getElementById("save-button1");

searchBar1.addEventListener("input", function() {
    var query = searchBar1.value;
    if (query.length >= 6) {
        var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
         searchResults1.innerHTML = this.responseText;
    }
};

        xhttp.open("GET", "natural/buscar.php?q=" + query, true);
        xhttp.send();
    } else {
        searchResults1.innerHTML = "";
    }
});


saveButton1.addEventListener("click", function() {
    var cedula = searchBar1.value;
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
                        xhttp2.open("POST", "natural/guardar.php", true);
                        xhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhttp2.send("cedula=" + cedula + "&numero=" + num);
                    }
                }
            }
        };
        xhttp.open("POST", "natural/validar.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("cedula=" + cedula + "&numero=" + num);
    } else {
        alert("Debe ingresar una cédula válida");
    }
});




var searchBar2 = document.getElementById("search-bar2");
var searchResults2 = document.getElementById("searchResults2");
var saveButton2 = document.getElementById("save-button2");

searchBar2.addEventListener("input", function() {
    var query = searchBar2.value;
    if (query.length >= 6) {
        var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
         searchResults2.innerHTML = this.responseText;
    }
};
        
        xhttp.open("GET", "juridica/buscar.php?q=" + query, true);
        xhttp.send();
    } else {
        searchResults2.innerHTML = "";
    }
});
saveButton2.addEventListener("click", function() {
    var cedula = searchBar2.value;
    var num = numero;
    if (cedula.length > 0) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);
                if (response.status == "error") {
                    alert(response.message);
                } else {
                    var confirmar = confirm("¿Desea guardar el Rif?");
                    if (confirmar) {
                        var xhttp2 = new XMLHttpRequest();
                        xhttp2.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                alert("Rif guardada en la base de datos");
                            }
                        };
                        xhttp2.open("POST", "juridica/guardar.php", true);
                        xhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhttp2.send("cedula=" + cedula + "&numero=" + num);
                    }
                }
            }
        };
        xhttp.open("POST", "juridica/validar.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("cedula=" + cedula + "&numero=" + num);
    } else {
        alert("Debe ingresar un Rif válida");
    }
});







var searchBar3 = document.getElementById("search-bar3");
var searchResults3 = document.getElementById("searchResults3");
var saveButton3 = document.getElementById("save-button3");

searchBar3.addEventListener("input", function() {
    var query = searchBar3.value;
    if (query.length >= 6) {
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
                    var confirmar = confirm("¿Desea guardar el Rif?");
                    if (confirmar) {
                        var xhttp2 = new XMLHttpRequest();
                        xhttp2.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                alert("Rif guardada en la base de datos");
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
        alert("Debe ingresar un Eif válida");
    }
});






var searchBar4 = document.getElementById("search-bar4");
var searchResults4 = document.getElementById("searchResults4");
var saveButton4 = document.getElementById("save-button4");

searchBar4.addEventListener("input", function() {
    var query = searchBar4.value;
    if (query.length >= 1) {
        var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
         searchResults4.innerHTML = this.responseText;
    }
};
        
        xhttp.open("GET", "servicio/buscar.php?q=" + query, true);
        xhttp.send();
    } else {
        searchResults4.innerHTML = "";
    }
});
saveButton4.addEventListener("click", function() {
    var cedula = searchBar4.value;
    var num = numero;
    if (cedula.length > 0) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);
                if (response.status == "error") {
                    alert(response.message);
                } else {
                    var confirmar = confirm("¿Desea guardar el Codigo?");
                    if (confirmar) {
                        var xhttp2 = new XMLHttpRequest();
                        xhttp2.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                alert("Codigo guardada en la base de datos");
                            }
                        };
                        xhttp2.open("POST", "servicio/guardar.php", true);
                        xhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhttp2.send("cedula=" + cedula + "&numero=" + num);
                    }
                }
            }
        };
        xhttp.open("POST", "servicio/validar.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("cedula=" + cedula + "&numero=" + num);
    } else {
        alert("Debe ingresar un Codigo válida");
    }
});







var searchBar5 = document.getElementById("search-bar5");
var searchResults5 = document.getElementById("searchResults5");
var saveButton5 = document.getElementById("save-button5");

searchBar5.addEventListener("input", function() {
    var query = searchBar5.value;
    if (query.length >= 6) {
        var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
         searchResults5.innerHTML = this.responseText;
    }
};
        
        xhttp.open("GET", "beneficiario/buscar.php?q=" + query, true);
        xhttp.send();
    } else {
        searchResults5.innerHTML = "";
    }
});
saveButton5.addEventListener("click", function() {
    var cedula = searchBar5.value;
    var num = numero;
    if (cedula.length > 0) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);
                if (response.status == "error") {
                    alert(response.message);
                } else {
                    var confirmar = confirm("¿Desea guardar el Codigo?");
                    if (confirmar) {
                        var xhttp2 = new XMLHttpRequest();
                        xhttp2.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                alert("Codigo guardada en la base de datos");
                            }
                        };
                        xhttp2.open("POST", "beneficiario/guardar.php", true);
                        xhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhttp2.send("cedula=" + cedula + "&numero=" + num);
                    }
                }
            }
        };
        xhttp.open("POST", "beneficiario/validar.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("cedula=" + cedula + "&numero=" + num);
    } else {
        alert("Debe ingresar un Codigo válida");
    }
});