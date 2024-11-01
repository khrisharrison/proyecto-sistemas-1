<div class="container">
 	  <?php
      	    include ("submenu.php");
      ?>
</div>
<script>
    function soloLetras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales = [8, 37, 39, 46];
        tecla_especial = false
        for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
    }
    function limpia() {
    var val = document.getElementById("miInput").value;
    var tam = val.length;
    for(i = 0; i < tam; i++) {
        if(!isNaN(val[i]))
            document.getElementById("miInput").value = '';
        }
    }
    function valideKey(evt){
			// code is the decimal ASCII representation of the pressed key.
			var code = (evt.which) ? evt.which : evt.keyCode;
			if(code==8) { // backspace.
			    return true;
			} else if(code>=48 && code<=57) { // is a number.
			    return true;
			} else{ // other keys.
			    return false;
			}
	}
    function ConfirmarEliminar(){
        var respuesta = confirm("¿Estas seguro que deseas eliminar?");
        if(respuesta == true){
            return true
        }else{
            return false
        }
    }
    function ConfirmarEditar(){
        var respuesta = confirm("¿Esta seguro que deseas modificar?");
        if(respuesta == true){
            return true
        }else{
            return false
        }
    }
</script>



		
	
		     
