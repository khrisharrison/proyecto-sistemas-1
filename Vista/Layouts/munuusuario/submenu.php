<head>

</head>
<nav class="navbar navbar-expand-lg navbar-dark menu">
<div class="container">
  <div class="row">
    <div class="col-12">
      <ul class="nav nav-tabs">
        <a class="trigger nav-link" href="\proyecto_polizas\home.php" >Inicio</a>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Datos Personales</a>
          <ul class="dropdown-menu">
            <li>
              <a class="trigger right-caret nav-link" href="\proyecto_polizas/Modelo/resposableN/responsable.php">Persona Natural</a> 
              <ul class="dropdown-menu sub-menu">
              </ul>
            </li>
            <li>
              <a class="trigger right-caret nav-link" href="\proyecto_polizas/Modelo/responsableJ/responsableJ.php">Persona Juridica</a>
              <ul class="dropdown-menu sub-menu">   
              </ul>
            <li>
              <a class="trigger right-caret nav-link" href="\proyecto_polizas/Modelo/beneficiario/beneficiario.php">Beneficiario</a>
              <ul class="dropdown-menu sub-menu">   
              </ul>
            </li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Datos Maestros</a>
          <ul class="dropdown-menu">
            <li>
              <a class="trigger right-caret nav-link" href="\proyecto_polizas/Modelo/Servicios/servicios.php">Servicios Funerarios</a> 
              <ul class="dropdown-menu sub-menu">
              </ul>
            </li>
            <li>
              <a class="trigger right-caret nav-link" href="\proyecto_polizas/Modelo/Funeraria/funeraria.php">Funerarias</a>
              <ul class="dropdown-menu sub-menu">   
              </ul>
            </li>
            <li>
              <a class="trigger right-caret nav-link" href="\proyecto_polizas/Modelo/Cementerio/cementerio.php">Cementerios</a>
              <ul class="dropdown-menu sub-menu">   
              </ul>
            </li>
            <li>
              <a class="trigger right-caret nav-link" href="\proyecto_polizas/Modelo/poliza/poliza.php">Pólizas</a>
              <ul class="dropdown-menu sub-menu">   
              </ul>
            </li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Transaccionales</a>
          <ul class="dropdown-menu">
            <li>
              <a class="trigger right-caret nav-link" href="\proyecto_polizas/Modelo/recibos/recibo.php">Recibos</a> 
              <ul class="dropdown-menu sub-menu">
              </ul>
            </li>
            <li>
              <a class="trigger right-caret nav-link" href="\proyecto_polizas/Modelo/facturas/factura.php">Facturas</a>
              <ul class="dropdown-menu sub-menu">
              </ul>
            </li>
          </ul>
        </li>
      
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Domicilio</a>
          <ul class="dropdown-menu">
            <li>
              <a class="trigger right-caret nav-link" href="\proyecto_polizas/Modelo/Estado/estado.php">Estado</a>
              <ul class="dropdown-menu sub-menu">
              </ul>
            </li>
            <li>
              <a class="trigger right-caret nav-link" href="\proyecto_polizas/Modelo/Municipio/index.php">Municipio</a>
              <ul class="dropdown-menu sub-menu">
              </ul>
            </li>
            <li>
              <a class="trigger right-caret nav-link" href="\proyecto_polizas/Modelo/Parroquia/index.php">Parroquia</a>
              <ul class="dropdown-menu sub-menu">
              </ul>
            </li>
            <li>
              <a class="trigger right-caret nav-link" href ="\proyecto_polizas/Modelo/Ciudad/index.php">Ciudad</a>
              <ul class="dropdown-menu sub-menu">
              </ul>
            </li>
          </ul>
        </li> 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Seguridad</a>
          <ul class="dropdown-menu">
            <li>
              <a class="trigger right-caret nav-link" href="\proyecto_polizas/Modelo/usuario/usuario.php">Usuarios</a>
              <ul class="dropdown-menu sub-menu">
              </ul>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Información</a>
          <ul class="dropdown-menu">
            <li>
              <a class="trigger right-caret nav-link" href="\proyecto_polizas\Modelo\Contacto\contact_u.php" class="trigger right-caret nav-link">Contáctanos</a>
            </li>             
          </ul> 
        </li>
              <a class="trigger nav-link " href="\proyecto_polizas" onclick="return confirmarCerrarSesion()">Salir</a> 
      </ul> 
    </div>  
  </div>
</div>
</nav>
<br><br><br>
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
  function confirmarCerrarSesion() {
    if (confirm("¿Está seguro de que desea cerrar sesión?")) {

    } else {
      // Si el usuario hace clic en "Cancelar", no se hace nada
      return false;
    }
  }
</script>