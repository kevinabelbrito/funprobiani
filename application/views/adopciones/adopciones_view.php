<section id="pet-file">
    <div class="row">
        <h2 class="text-center">Solicitudes de Adopción</h2>
        <br>
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
                        <a href="<?= base_url() ?>adopciones/detalles/<?= $adopcion->id ?>" title="Detalles de la adopcion"><span class="icon-wallet"></span></a>
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
                    <h2 class="title text-center">No se encontraron Adopciones registradas</h2>
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