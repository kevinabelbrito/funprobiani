<section id="pet-file">
  <div class="row">
    <div class="small-16 columns">
      <div class="pet-file-box">
        <h6><?= $nombre ?></h6>
        <div class="pet-file-menu">
          <img src="<?= base_url() ?>assets/images/personas/<?= $foto ?>" width="200" height="200"/>
          <a href="#" class="button radius active" id="perfiles">Perfil</a>
          <a href="#" class="button radius" id="adopcion">Adopciones (<?= $num_adopciones ?>)</a>
          <a href="#" class="button radius" id="donacion">Donaciones (<?= $num_donaciones ?>)</a>
        </div>
      </div><!--box-->
    </div>
  </div>

  <div class="row">
    <div class="small-16 columns" id="perfil">
      <table class="file-1"> 
        <tbody> 
          <tr> 
            <td>Nombre</td> 
            <td><?= $nombre ?></td> 
          </tr>
          <tr> 
            <td>Cedula de Identidad</td> 
            <td><?= $cedula ?></td> 
          </tr>
          <tr>
            <td>Fecha de Nacimiento</td>
            <td><?= date("d/m/Y", strtotime($fenac)) ?></td>
          </tr>
          <tr>
            <td>Estado Civil</td>
            <td><?= $edo_civil ?></td>
          </tr>
          <tr> 
            <td>Teléfono</td> 
            <td><?= $tlf ?></td> 
          </tr>
          <tr> 
            <td>Correo Electrónico</td> 
            <td><?= $email ?></td> 
          </tr>
          <tr> 
            <td>Dirección de Habitación</td> 
            <td><?= $dir ?></td> 
          </tr>
          <?php if($tipo == "Hogar temporal"): ?>
          <tr>
            <td colspan="2" align="center"><b>Datos del hogar Temporal</b></td>
          </tr>
          <tr> 
            <td>Tipo de Vivienda</td> 
            <td><?= $viv ?></td> 
          </tr>
          <tr> 
            <td>Nro de Casa</td> 
            <td><?= $nro_casa ?></td> 
          </tr>
          <tr>
              <td>Teléfono Local</td>
              <td><?= $tlf_local ?></td>
          </tr>
          <tr>
              <td>Dirección del Hogar Temporal</td>
              <td><?= $dir_hogar ?></td>
          </tr>
          <?php endif ?>
        </tbody> 
      </table>
    </div>
    <div class="small-16 columns" id="adopciones">
        <table>
            <tr>
                <th><b>Fotografía</b></th>
                <th><b>Nombre</b></th>
                <th><b>Edad</b></th>
                <th><b>Solicitud</b></th>
                <th><b>Respuesta</b></th>
                <th><b></b></th>
            </tr>
            <?php
            if ($num_adopciones > 0){
                foreach ($adopciones as $adopcion):
            ?>
            <tr>
                <td><img src="<?= base_url() ?>assets/images/mascotas/<?= $adopcion->foto ?>" width="120px" height="120px"></td>
                <td><?= $adopcion->nombre ?></td>
                <td><?= $adopcion->edad ?></td>
                <td><?= date("d/m/Y", strtotime($adopcion->solicitud)) ?></td>
                <td>
                    <?php
                    if ($adopcion->respuesta == "0000-00-00 00:00:00")
                    {
                        echo "En Espera";
                    }
                    else
                    {
                        echo date("d/m/Y", strtotime($adopcion->respuesta))."<br>(".$adopcion->estado.")";
                    }
                    ?>
                </td>
                <td>
                    <div id="opciones">
                        <a href="<?= base_url() ?>adopciones/detalles/<?= $adopcion->id ?>" title="Detalles de la adopción"><span class="icon-wallet"></span></a>
                    </div>
                </td>
            </tr>
            <?php
            endforeach;
            }
            else
            {
            ?>
            <tr>
                <td colspan="6">
                    <h2 class="title text-center">No ha emitido solicitudes de adopcion</h2>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <div class="small-16 columns" id="donaciones">
        <table>
            <tr>
                <th><b>Tipo</b></th>
                <th><b>Descripcion</b></th>
                <th><b>Cantidad</b></th>
                <th><b>Solicitud</b></th>
                <th><b>Respuesta</b></th>
                <th></th>
            </tr>
            <?php
            if($num_donaciones > 0){
              foreach ($donaciones as $donacion): ?>
            <tr>
                <td><?= $donacion->tipo ?></td>
                <td><?= $donacion->descripcion ?></td>
                <td><?= $donacion->cantidad ?></td>
                <td><?= date("d/m/Y", strtotime($donacion->solicitud)) ?></td>
                <td>
                  <?php 
                  if ($donacion->respuesta != "0000-00-00 00:00:00")
                  {
                    echo date("d/m/Y", strtotime($donacion->respuesta))."<br>(".$donacion->estado.")";
                  }
                  else
                  {
                    echo "En espera.";
                  }
                  ?>
                </td>
                <td>
                    <?php if($this->session->userdata('tipo') == "persona" && $donacion->estado == "Espera"): ?>
                    <div id="opciones">
                        <a href="<?= base_url() ?>donaciones/decidir/Cancelada/<?= $donacion->id ?>" title="Cancelar Donación"><span class="icon-cross"></span></a>
                    </div>
                    <?php endif ?>
                </td>
            </tr>
            <?php
              endforeach;
            }
            else
            {
            ?>
            <tr>
                <td colspan="7">
                    <h2 class="title text-center">No ha efectuado donaciones</h2>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
  </div>
  <?php if($this->session->userdata('tipo') == "persona"): ?>
        <div class="row">
          <div class="text-center">
            <a href="<?= base_url() ?>personas/editar" class="button radius">Editar datos personales</a>
          </div>
        </div>
  <?php endif ?>
</section>
<?php if($this->session->userdata('tipo') == "admin"): ?>
<section id="contact-callout">
    <div class="row">
        <div class="small-16 columns" id="frontpage-il">
            <img src="<?= base_url() ?>assets/images/illustrations/frontpage.png">
            <a href="<?= base_url() ?>personas" class="button radius">Personas inscritas</a>
        </div>
    </div>
</section>
<?php endif ?>
<script>
    $(function(){
        $("#perfil").show();
        $("#adopciones").hide();
        $("#donaciones").hide();
        $("#adopcion").click(function(){
            $("#perfil").hide();
            $("#perfiles").removeClass("active");
            $("#donacion").removeClass("active");
            $("#adopcion").addClass("active");
            $("#adopciones").show(500);
            $("#donaciones").hide();
            return false;
        });
        $("#donacion").click(function(){
            $("#perfil").hide();
            $("#perfiles").removeClass("active");
            $("#adopcion").removeClass("active");
            $("#donacion").addClass("active");
            $("#adopciones").hide();
            $("#donaciones").show(500);
            return false;
        });
        $("#perfiles").click(function(){
            $("#perfil").show(500);
            $("#donacion").removeClass("active");
            $("#adopcion").removeClass("active");
            $("#perfiles").addClass("active");
            $("#adopciones").hide();
            $("#donaciones").hide();
            return false;
        });
    });
</script>