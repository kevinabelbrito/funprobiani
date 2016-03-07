<section id="pet-file">
    <div class="row">
        <h2 class="text-center">Mascotas en adopción</h2>
        <br>
        <table>
            <tr>
                <th><b>Fotografía</b></th>
                <th><b>Nombre</b></th>
                <th><b>Especie</b></th>
                <th><b>Edad</b></th>
                <th><b></b></th>
            </tr>
            <?php
            if($num_mascotas > 0){
            foreach ($mascotas as $pet):
            ?>
            <tr>
                <td><img src="<?= base_url() ?>assets/images/mascotas/<?= $pet->foto ?>" width="120px" height="120px"></td>
                <td><?= $pet->nombre ?></td>
                <td><?= $pet->especie ?></td>
                <td><?= $pet->edad ?></td>
                <td>
                    <div id="opciones">
                        <a href="<?= base_url() ?>mascotas/perfil/<?= $pet->id ?>" title="Detalles de la Mascota"><span class="icon-wallet"></span></a>
                        <a href="<?= base_url() ?>mascotas/eliminar/<?= $pet->id ?>/<?= $pet->foto ?>" title="Eliminar Mascota"><span class="icon-cross"></span></a>
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
            <td colspan="5">
                <h2 class="title text-center">No se encontraron mascotas registradas</h2>
            </td>
        </tr>
            <?php } ?>
        </table>
    </div>
    <div class="row">
        <?= $pagination ?>
    </div>
</section>

<section id="contact-callout">
    <div class="row">
        <div class="medium-8 small-16 columns" id="frontpage-il">
            <img src="<?= base_url() ?>assets/images/illustrations/cat.png">
            <a href="<?= base_url() ?>mascotas/registrar" class="button radius">Agregar mascota</a>
        </div>
        <div class="medium-8 small-16 columns" id="frontpage-il">
            <img src="<?= base_url() ?>assets/images/illustrations/frontpage_min.png">
            <a href="<?= base_url() ?>admin" class="button radius">Menú de Usuario</a>
        </div>
    </div>
</section>