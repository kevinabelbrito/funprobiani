<section id="office" class="blue">
  <div class="row">
    <div class="small-16 columns">
      <h1 class="text-center title">Mascotas en adopción</h1>
    </div>
  </div>
  <div class="row">
    <div class="small-16 columns">
      <?php if($num_pets > 0){ ?>
      <ul id="office-gallery" class="clearing-thumbs small-block-grid-2 medium-block-grid-4 large-block-grid-5">
        <?php foreach ($pets as $pet): ?>
        <li>
            <a href="<?= base_url() ?>mascotas/perfil/<?= $pet->id ?>" class="polaroid">
                <img src="<?= base_url() ?>assets/images/mascotas/<?= $pet->foto ?>" data-caption="Add a caption here" alt="image alt text">
                <br><br>
                <strong><?= $pet->nombre ?></strong>
            </a>
        </li>
        <?php endforeach ?>
      </ul>
      <?php
        }
        else
        {
      ?>
      <h3 class="text-center">No se encontraron registros de la especie</h3>
      <div align="center">
          <a href="<?= base_url() ?>mascotas/adopta" class="button radius">Ver otras especies</a>
      </div>
      <?php } ?>
    </div>
  </div>
    <div class="row">
        <?= $pagination ?>
    </div>
</section>
<div class="row">
    <div class="large-16 columns">
        <img src="<?= base_url() ?>assets/images/large_sep.png" alt="spliter" class="large-spliter" />
    </div>
</div>
<section id="contact-callout">
  <div class="row">
    <div class="small-16 medium-12 columns">
      <h1>¿Tienes alguna duda?</h1>
      <p>Puedes comunicarte con nosotros por los telefonos que vez en pantalla o escribirnos directamente a nuestro correo electrónico funprobiani@gmail.com, estamos siempre dispuestos a resolver cualquier duda que tengas.
      </p>
      <a href="<?= base_url() ?>home/contactanos" class="button radius">Contactanos</a>
    </div>
    <div class="medium-4 columns">
      <img src="<?= base_url() ?>assets/images/illustrations/callout.png" alt="vet hello">
    </div>
  </div>
</section>