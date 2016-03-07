<section id="pet-file">
    <div class="row">
        <div class="small-16 columns">
            <div class="pet-file-box">
                <h6><?= $nombre ?></h6>
                <div class="pet-file-menu">
                    <img src="<?= base_url() ?>assets/images/mascotas/<?= $foto ?>" width="200" height="200"/>
                    <a href="#" class="button radius active" id="perfiles">Datos de la mascota</a>
                </div>
            </div><!--box-->
        </div>
    </div>

  <div class="row">
    <div class="small-16 columns">
      <table class="file-1"> 
        <tbody> 
          <tr> 
            <td>Nombre</td> 
            <td><?= $nombre ?></td> 
          </tr>
          <tr> 
            <td>Edad Aproximada</td> 
            <td><?= $edad ?></td> 
          </tr>
          <tr> 
            <td>Sexo</td> 
            <td><?= $sexo ?></td> 
          </tr>
          <tr> 
            <td>Peso</td> 
            <td><?= $peso ?></td> 
          </tr>
          <tr> 
            <td>Especie</td> 
            <td><?= $especie ?></td> 
          </tr>
          <tr> 
            <td>Vacunado</td> 
            <td><?= $vacunado ?></td> 
          </tr>
          <tr> 
            <td>Esterilizado</td> 
            <td><?= $esterilizado ?></td> 
          </tr>
          <tr>
              <td>Descripción</td>
              <td><?= $descripcion ?></td>
          </tr>
        </tbody> 
      </table>          
    </div>
  </div>
  <?php if($this->session->userdata('tipo') != "admin"): ?>
  <div class="row">
      <div class="small-16 columns text-center">
          <a href="<?= base_url() ?>adopciones/tramitar/<?= $id ?>/<?= $especie ?>" class="button radius">Tramitar Adopción</a>
      </div>
  </div>
  <?php endif; ?>
  <?php if($this->session->userdata('tipo') == "admin"): ?>
        <div class="row">
          <div class="text-center">
            <a href="<?= base_url() ?>mascotas/editar/<?= $id ?>/<?= $foto ?>" class="button radius">Editar datos de la mascota</a>
          </div>
        </div>
  <?php endif ?>
</section>
<?php if($this->session->userdata('tipo') == "admin"): ?>
<section id="contact-callout">
    <div class="row">
        <div class="medium-8 small-16 columns" id="frontpage-il">
            <img src="<?= base_url() ?>assets/images/illustrations/dog.png">
            <a href="<?= base_url() ?>mascotas" class="button radius">Mascotas</a>
        </div>
        <div class="medium-8 small-16 columns" id="frontpage-il">
            <img src="<?= base_url() ?>assets/images/illustrations/frontpage_min.png">
            <a href="<?= base_url() ?>admin" class="button radius">Menu de Usuarios</a>
        </div>
    </div>
</section>
<?php endif ?>