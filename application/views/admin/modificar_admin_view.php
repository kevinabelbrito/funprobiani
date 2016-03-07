<div class="container">
    <div class="row">
        <h2 class="title text-center">Editar datos del administrador</h2>
        <div class="medium-8 small-16 columns">
            <form id="new_admin">
                <div data-alert class="alert-box success radius">
                    Los cambios fueron realizados exitosamente.
                </div>
                <div data-alert class="alert-box alert radius"></div>
                <input type="text" name="nombre" id="nombre" placeholder="Nombres y Apellidos" title="Nombres y Apellidos" maxlength="100" value="<?= $this->session->userdata('nombre') ?>">
                <input type="email" name="email" id="email" placeholder="Correo Electrónico" title="Correo Electrónico" maxlength="80" value="<?= $this->session->userdata('email') ?>">
                <button class="button radius">Guardar Cambios</button>
            </form>
        </div>
        <div class="medium-8 small-16 columns" id="frontpage-il">
            <img src="<?= base_url() ?>assets/images/illustrations/callout.png">
            <a href="<?= base_url() ?>admin/cambio" class="button radius">Cambiar Contraseña</a>
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
                $.post("<?= base_url() ?>admin/modificar", str, success_data).error(error_data);
                function success_data(data)
                {
                    if (data == "bien")
                    {
                        $(".success").show(200).delay(5000).hide(500);
                        window.location = "<?= base_url() ?>admin";
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
                email:{required:true, email:true}
            },
            messages:
            {
                nombre:"Indique el campo",
                email:{required:"Indique el campo", email:"Formato incorrecto"}
            }
        });
    });
</script>