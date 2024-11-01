<footer>
<div id="footer" align="center">

    <br> <br> <br>
    </b>
    <div class = "container">

    <br>

        <div class="accordion" id="accordionFoot">

          <div class="card">
               

              <div class="card-header" id="headingFoot">
                  <h6 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFoot" aria-expanded="false" aria-controls="collapseFoot">
                      <label class="text-success"> <strong> Sistemas de Información I </strong></label> 
                       <br> @Copyright 2023 
                      </button>
                  </h6>
              </div>


              <div id="collapseFoot" class="collapse" aria-labelledby="headingFoot" data-parent="#accordionFoot">
                    <div class="card-body">
                          <div class = "row">
                               <div class ="col" align= "center">
                                    <img width="20%" src="\proyecto_polizas/imagenes/Logo_UDO.png" alt="Logo UDONE">
                               </div>
                          </div>

                          <div class = "row">
                                <div class ="col" align= "center">
                                      <p class="text-dark"> <br>
                                      Grupo de Estudiantes de la Carrera Licenciatura en Informática<br> 
                                      Uiversidad de Oriente - Núcleo de Nueva Esparta (UDONE) <br>
                                      Sector Guatamare - La Asunción - Isla de Margarita <br>
                                      Estado Nueva Esparta - Venezuela<br>
                                      Código Postal 6312<br>
                                      <?php
                                     echo '<a href="https://mail.google.com/mail/?view=cm&to=si-udone%40hotmail.com"  class="text-success" target="_blank"><ins><strong>si-udone@hotmail.com</strong></ins></a><br>';
                                      ?>
                                    </p>
                          </div>
                    </div>
              </div>
          </div>

          <div class="card"> </div>
        </div>
     </div>
</div>
</footer>

    <script type="module">
      import * as bootstrap from 'bootstrap'

      new bootstrap.Popover(document.getElementById('popoverButton'))
    </script>

    <!-- SCRIPT DATA TABLE -->
    <script src="../../js/jquery-3.5.1.js"></script>
    <script src="../../js/jquery.dataTables.min.js"></script>
    <script src="../../js/dataTables.bootstrap5.min.js"></script>
    <script>
    var table = new DataTable('#example', {
    language: {
        url: "../../js/es-ES.json",
    },
    });
</script>

 
