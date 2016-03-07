<section id="pet-file">
    <div class="row">
        <h2 class="text-center">Personas afiliadas a la fundación</h2>
        <br>
        <table>
            <tr>
                <th><b>Fotografía</b></th>
                <th><b>Tipo</b></th>
                <th><b>Nombre</b></th>
                <th><b>Telefono</b></th>
                <th><b></b></th>
            </tr>
            <?php
            if($num_personas > 0){
            foreach ($personas as $psn):
            ?>
            <tr>
                <td><img src="<?= base_url() ?>assets/images/personas/<?= $psn->foto ?>" width="120px" height="120px"></td>
                <td><?= $psn->tipo ?></td>
                <td><?= $psn->nombre ?></td>
                <td><?= $psn->tlf ?></td>
                <td>
                    <div id="opciones">
                        <a href="<?= base_url() ?>personas/perfiles/<?= $psn->id ?>" title="Detalles"><span class="icon-wallet"></span></a>
                        <a href="<?= base_url() ?>personas/eliminar/<?= $psn->id ?>/<?= $psn->foto ?>" title="Eliminar"><span class="icon-cross"></span></a>
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
                <h2 class="title text-center">No se encontraron personas registradas</h2>
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
        <div class="small-16 columns" id="frontpage-il">
            <img src="<?= base_url() ?>assets/images/illustrations/frontpage.png">
            <a href="<?= base_url() ?>admin" class="button radius">Panel Administrativo</a>
        </div>
    </div>
</section>