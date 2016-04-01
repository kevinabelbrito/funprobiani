<div class="container">
    <div class="row">
        <h2 class="title text-center">Cambio de Contraseña</h2>
        <div class="medium-8 small-16 columns">
            <form id="new_admin">
                <div data-alert class="alert-box success radius">
                    La contraseña ha sido cambiada exitosamente.
                </div>
                <div data-alert class="alert-box alert radius"></div>
                <input type="password" name="clave" id="clave" placeholder="Contraseña actual" maxlength="20">
                <input type="password" name="nueva" id="nueva" placeholder="Nueva Contraseña" maxlength="20">
                <input type="password" name="rep" id="rep" placeholder="Confirma la Contraseña" maxlength="20">
                <button class="button radius">Guardar Cambios</button>
            </form>
        </div>
        <div class="medium-8 small-16 columns" id="frontpage-il">
            <img src="<?= base_url() ?>assets/images/illustrations/callout.png">
            <a href="<?= base_url() ?>admin/modificar" class="button radius">Modificar Datos</a>
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
                $.post("<?= base_url() ?>admin/cambio", str, success_data).error(error_data);
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
                        jQuery.fn.reset = function(){
                            $(this).each(function(){ this.reset(); });
                        }
                        $("#new_admin").reset();
                        $("#clave").focus();
                    }
                }
                function error_data()
                {
                    $(".alert").html("No fue posible conectar con el servidor.").show(200).delay(5000).hide(500);
                }
            },
            rules:
            {
                clave:"required",
                nueva:{required:true, rangelength:[6,20]},
                rep:{required:true, equalTo:"#nueva"}
            },
            messages:
            {
                clave:"*Campo requerido",
                nueva:{required:"*Campo requerido", rangelength:"Minimo 6 caracteres"},
                rep:{required:"*Campo requerido", equalTo:"Deben coincidir las contraseñas"}
            }
        });
    });
</script>