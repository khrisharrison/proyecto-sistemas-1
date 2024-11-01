



<head>
  
<nav class="navbar navbar-expand-lg navbar-dark menu">
<div class ="container">
  <div class = "row">
    <div class="col-12">
 
		<ul class="nav nav-tabs">
     <a class="trigger nav-link" href="\proyecto_polizas"class="trigger right-caret nav-link">Inicio</a>
                  
 			<li class="nav-item dropdown">
    		    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Información</a>
    		      
              <ul class="dropdown-menu">
                      <li>
                           <a class="trigger right-caret nav-link" href="http://localhost/proyecto_polizas\Modelo\Contacto\contact.php"class="trigger right-caret nav-link">Contáctanos</a>
                      </li>             
                </ul>  
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Ingresar</a>
                  <ul class="dropdown-menu">
                      <li>
                           <a class="trigger right-caret nav-link" href="http://localhost/proyecto_polizas\Modelo\login\login.php"class="trigger right-caret nav-link">Inicio Sesión</a>
                             <ul class="dropdown-menu sub-menu">  
                            </ul>
                        </li>
                  </ul>
            </li>
		</ul> 
	</div>  
  </div>
</div>
</nav>
 <script type="text/javascript">
$(document).ready(function() {
  // Cierra el menú al inicio
  $('.navbar-collapse').removeClass('show');

  // Abre el menú al pasar el mouse sobre él
  $('.navbar-nav').mouseenter(function() {
    $('.navbar-collapse').addClass('show');
  });

  // Cierra el menú al quitar el mouse del menú
  $('.navbar-nav').mouseleave(function() {
    $('.navbar-collapse').removeClass('show');
  });

  // Cierra el menú al hacer clic en un elemento del menú
  $('.navbar-nav .nav-link').on('click', function() {
    $('.navbar-collapse').removeClass('show');
  });
});
</script>

