<div class="container">
    <div class="row">
        <h2 class="title text-center">Editar datos del usuario</h2>
        <div class="medium-8 small-16 columns">
            <form id="new_admin">
                <div data-alert class="alert-box success radius">
                    Las datos fueron actualizados exitosamente.
                </div>
                <div data-alert class="alert-box alert radius"></div>
                <input type="text" name="nombre" id="nombre" placeholder="Nombres y Apellidos" title="Nombres y Apellidos" maxlength="100" value="<?= $nombre ?>">
                <input type="email" name="email" id="email" placeholder="Correo Electrónico" title="Correo Electrónico" maxlength="80" value="<?= $email ?>">
                <select name="tipo" id="tipo">
                    <option value="<?= $tipo ?>"><?= $tipo ?></option>
                    <option value="">Tipo de Usuario</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Usuario">Usuario</option>
                </select>
                <button class="button radius">Guardar Cambios</button>
            </form>
        </div>
        <div class="medium-8 small-16 columns" id="frontpage-il">
            <img src="<?= base_url() ?>assets/images/illustrations/callout.png">
            <a href="<?= base_url() ?>admin/usuarios" class="button radius">Usuarios</a>
        </div>
    </div>
</div>
<script>
    $(function(){
        $(".success").hide();
        $(".alert").hide();
        $("#new_admin").validate({
            submitHandler:function(){
                var str = $("#new_admin").serialize();
                $.post("<?= base_url() ?>admin/editar/<?= $id ?>", str, success_data).error(error_data);
                function success_data(data)
                {
                    if (data == "bien")
                    {
                        $(".success").show(200).delay(5000).hide(500);
                        window.location = "<?= base_url() ?>admin/usuarios";
                    }
                    else
                    {
                        $(".alert").html(data).show(200).delay(5000).hide(500);
                    }
                }
                function error_data()
                {
                    $(".alert").html("No fue posible conectar con el servidor.").show(200).delay(5000).hide(500);
                }
            },
            rules:
            {
                nombre:"required",
                email:{required:true, email:true},
                tipo:"required"
            },
            messages:
            {
                nombre:"Indique el campo",
                email:{required:"Indique el campo", email:"Formato incorrecto"},
                tipo:"Indique el campo"
            }
        });
    });
</script>