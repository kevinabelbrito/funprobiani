<section id="pet-file">

  <div class="row">
    <div class="small-16 columns">
      <div class="pet-file-box">
        <h6>Detalles de la Adopción</h6>
        <div class="pet-file-menu">
          <img src="<?= base_url() ?>assets/images/personas/<?= $foto_per ?>"/>
          <img src="<?= base_url() ?>assets/images/mascotas/<?= $foto_mas ?>">
          <a href="#" class="button radius active" id="principal">Datos Principales</a>
          <a href="#" class="button radius" id="entrevista">Entrevista</a>
        </div>
      </div><!--box-->
    </div>
  </div>

  <div class="row">
    <div class="small-16 columns" id="principal_table">
      <table class="file-1"> 
        <tbody> 
          <tr> 
            <td>Responsable</td> 
            <td><?= $persona ?></td> 
          </tr>
          <tr>
              <td>Cedula de Identidad</td>
              <td><?= $cedula ?></td>
          </tr>
          <tr>
              <td>Teléfono</td>
              <td><?= $tlf ?></td>
          </tr>
          <tr> 
            <td>Mascota</td> 
            <td><?= $mascota ?></td> 
          </tr>
          <tr>
              <td>Especie</td>
              <td><?= $especie ?></td>
          </tr>
          <tr>
              <td>Edad Aproximada</td>
              <td><?= $edad ?></td>
          </tr>
          <tr> 
            <td>Tipo de Adopción</td> 
            <td><?= $tipo ?></td> 
          </tr>
          <tr> 
            <td>Fecha de Solicitud</td> 
            <td><?= date("d/m/Y h:i a", strtotime($solicitud)) ?></td> 
          </tr>
          <tr> 
            <td>Fecha de Respuesta</td> 
            <td>
              <?php
                if($respuesta == "0000-00-00 00:00:00")
                {
                  echo $estado;
                }
                else
                {
                  echo date("d/m/Y h:i a", strtotime($respuesta))." (".$estado.")";
                }
                ?>
            </td> 
          </tr>
        </tbody> 
      </table>
    </div>
    <div class="small-16 columns" id="entrevista_table">
        <table>
            <tr>
                <th><b>1.- ¿Cuál es su interés en adoptar una mascota?</b></th>
            </tr>
            <tr>
                <td><?= $interes ?></td>
            </tr>
            <tr>
                <th><b>2.- ¿Ha tenido mascotas anteriormente? Explique cuáles y donde están ahora.</b></th>
            </tr>
            <tr>
                <td><?= $mascotas ?></td>
            </tr>
            <tr>
                <th><b>3.- ¿Entiende usted el porqué se realizan las campañas de esterilización? Qué opina?</b></th>
            </tr>
            <tr>
                <td><?= $esterilizacion ?></td>
            </tr>
            <tr>
                <th><b>4.- ¿Cuántas personas viven con usted? y están todas sinceramente de acuerdo con llevar una mascota a casa?</b></th>
            </tr>
            <tr>
                <td><?= $personas ?></td>
            </tr>
            <tr>
                <th><b>5.- ¿La casa es propia o alquilada?</b></th>
            </tr>
            <tr>
                <td><?= $casa ?></td>
            </tr>
            <tr>
                <th><b>6.- ¿Sabe usted que el tener una mascota es un compromiso para toda la vida? que ellos no son desechables ni juguetes de temporada?</b></th>
            </tr>
            <tr>
                <td><?= $compromiso ?></td>
            </tr>
            <tr>
                <th><b>7.- ¿Está consciente que ellos merecen un poco de atención, que ellos hacen sus necesidades por ende debe limpiar y que ameritan de educación por parte de Ud. para crear sus costumbres?</b></th>
            </tr>
            <tr>
                <td><?= $atencion ?></td>
            </tr>
            <tr>
                <th><b>8.- ¿Está preparado económicamente para mantener una mascota?</b></th>
            </tr>
            <tr>
                <td><?= $economico ?></td>
            </tr>
            <tr>
                <th><b>9.- ¿Está usted consciente que a partir de este momento es usted el dueño y responsable del bienestar del adoptado? Consciente que de ahora en adelante debe llevar el control de sus vacunas y costear cualquier asistencia veterinaria que su mascota amerite?</b></th>
            </tr>
            <tr>
                <td><?= $responsable ?></td>
            </tr>
            <tr>
                <th><b>10.- ¿Tiene o conoce algún veterinario en especifico? cuál?</b></th>
            </tr>
            <tr>
                <td><?= $veterinario ?></td>
            </tr>
            <tr>
                <th><b>11.- ¿Dónde o con quién dejaría a su mascota a la hora de salir de vacación?</b></th>
            </tr>
            <tr>
                <td><?= $vacacion ?></td>
            </tr>
            <tr>
                <th><b>12.- ¿Está usted de acuerdo  con las visitas realizadas a la mascota por parte de la fundación? Por qué?</b></th>
            </tr>
            <tr>
                <td><?= $visitas ?></td>
            </tr>
            <tr>
                <th><b>13.- ¿Ha leído el compromiso de adopción y conoce los parámetros bajo los cuales trabajamos?</b></th>
            </tr>
            <tr>
                <td><?= $parametros ?></td>
            </tr>
            <tr>
              <th><b>14.- Descargue la planilla de compromiso de adopción</b></th>
            </tr>
            <tr>
              <td>
                <div class="text-center">
                  <a href="<?= base_url() ?>assets/documents/CompromisoAdopcionModificado.docx" target="_blank" class="button radius">Descargar</a>
                </div>
              </td>
            </tr>
        </table>
    </div>
  </div>
  <div class="row">
      <div class="text-center">
          <a href="javascript:history.go(-1)" class="button radius" title="Regresar"><span class="icon-back"></span></a>
          <?php if($this->session->userdata('tipo') == "admin" && $estado == "Espera"): ?>
          <a href="<?= base_url() ?>adopciones/decidir/Aprobada/<?= $id ?>/<?= $id_mascota ?>" class="button radius" title="Aceptar"><span class="icon-check"></span></a>
          <a href="<?= base_url() ?>adopciones/decidir/Rechazada/<?= $id ?>/<?= $id_mascota ?>" class="button radius" title="Rechazar"><span class="icon-block"></span></a>
        <?php endif ?>
        <?php if($this->session->userdata('tipo') == "persona" && $estado == "Espera"): ?>
          <a href="<?= base_url() ?>adopciones/decidir/Cancelada/<?= $id ?>/<?= $id_mascota ?>" class="button radius" title="Cancelar"><span class="icon-cross"></span></a>
        <?php endif ?>
      </div>
  </div>
</section>
<script>
    $(function(){
        $("#principal_table").show();
        $("#entrevista_table").hide();
        $("#entrevista").click(function(){
            $("#principal_table").hide();
            $("#principal").removeClass("active");
            $("#entrevista").addClass("active");
            $("#entrevista_table").show(500);
            return false;
        });
        $("#principal").click(function(){
            $("#entrevista_table").hide();
            $("#entrevista").removeClass("active");
            $("#principal").addClass("active");
            $("#principal_table").show(500);
            return false;
        });
    });
</script>