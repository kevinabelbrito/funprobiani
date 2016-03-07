<section id="pet-file">
    <div class="row">
        <h2 class="text-center">Usuarios del Sistema</h2>
        <br>
        <table>
            <tr>
                <th>Nombres y Apellidos</th>
                <th>Correo Electrónico</th>
                <th>Tipo de Usuario</th>
                <th></th>
            </tr>
            <?php
            if($admin_num > 0)
            {
                foreach ($admin as $user):
            ?>
            <tr>
                <td><?= $user->nombre ?></td>
                <td><?= $user->email ?></td>
                <td><?= $user->tipo ?></td>
                <td>
                    <div id="opciones">
                        <?php if($user->id != $this->session->userdata('id') && $this->session->userdata('tipo_admin') == "Administrador"): ?>
                        <a href="<?= base_url() ?>admin/editar/<?= $user->id ?>"><span class="icon-pencil" title="Editar"></span></a>
                        <a href="<?= base_url() ?>admin/eliminar/<?= $user->id ?>" title="Eliminar Usuario"><span class="icon-cross"></span></a>
                        <?php endif ?>
                    </div>
                </td>
            </tr>
            <?php
                endforeach;
            }
            else
            {
            ?>
            <td colspan="3">
                <h2>No se encontró ningun usuario.</h2>
            </td>
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
            <?php if($this->session->userdata('tipo_admin') == "Administrador"): ?>
            <img src="<?= base_url() ?>assets/images/illustrations/callout_min.png">
            <a href="<?= base_url() ?>admin/agregar" class="button radius">Agregar usuario</a>
            <?php endif ?>
        </div>
        <div class="medium-8 small-16 columns" id="frontpage-il">
            <img src="<?= base_url() ?>assets/images/illustrations/frontpage_min.png">
            <a href="<?= base_url() ?>admin" class="button radius">Menú de Usuario</a>
        </div>
    </div>
</section>