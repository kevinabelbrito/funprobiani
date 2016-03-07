<section id="pet-file">
    <div class="row">
        <h2 class="text-center">Donaciones</h2>
        <br>
        <table>
            <tr>
                <th>Responsable</th>
                <th>Tipo</th>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>Solicitud</th>
                <th>Respuesta</th>
                <th></th>
            </tr>
            <?php
            if($num_don > 0){
            foreach ($donaciones as $dona):
            ?>
            <tr>
                <td><?= $dona->nombre ?></td>
                <td><?= $dona->tipo ?></td>
                <td><?= $dona->descripcion ?></td>
                <td><?= $dona->cantidad ?></td>
                <td><?= date("d/m/Y", strtotime($dona->solicitud)) ?></td>
                <td>
                    <?php
                    if($dona->respuesta == "0000-00-00 00:00:00")
                    {
                        echo $dona->estado;
                    }
                    else
                    {
                        echo date("d/m/Y", strtotime($dona->respuesta))."<br>(".$dona->estado.")";
                    }
                    ?>
                </td>
                <td>
                    <?php if($dona->estado == "Espera"): ?>
                    <div id="opciones">
                        <a href="<?= base_url() ?>donaciones/decidir/Aprobada/<?= $dona->id ?>" title="Aceptar"><span class="icon-check"></span></a>
                        <a href="<?= base_url() ?>donaciones/decidir/Rechazada/<?= $dona->id ?>" title="Rechazar"><span class="icon-block"></span></a>
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
                <td colspan="6">
                    <h2 class="title text-center">No se encontraron Donaciones registradas</h2>
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
            <a href="<?= base_url() ?>admin" class="button radius">Menú de Usuario</a>
        </div>
    </div>
</section>