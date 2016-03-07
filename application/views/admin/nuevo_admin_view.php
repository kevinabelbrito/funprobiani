<div class="container">
    <div class="row">
        <h2 class="title text-center">Registrar nuevo usuario administrador</h2>
        <div class="medium-8 small-16 columns">
            <form id="new_admin">
                <div data-alert class="alert-box success radius">
                    El usuario fue registrado exitosamente.
                </div>
                <div data-alert class="alert-box alert radius"></div>
                <input type="text" name="nombre" id="nombre" placeholder="Nombres y Apellidos" title="Nombres y Apellidos" maxlength="100">
                <input type="email" name="email" id="email" placeholder="Correo Electrónico" title="Correo Electrónico" maxlength="80">
                <select name="tipo" id="tipo">
                    <option value="">Tipo de Usuario</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Usuario">Usuario</option>
                </select>
                <input type="password" name="clave" id="clave" placeholder="Contraseña" title="Contraseña" maxlength="15">
                <input type="password" name="conf" id="conf" placeholder="Repetir Contraseña" title="Repetir Contraseña" maxlength="15">
                <button class="button radius">Guardar</button>
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
                $.post("<?= base_url() ?>admin/agregar", str, success_data).error(error_data);
                function success_data(data)
                {
                    if (data == "bien")
                    {
                        $(".success").show(200).delay(5000).hide(500);
                        jQuery.fn.reset = function(){
                            $(this).each(function(){ this.reset(); });
                        }
                        $("#new_admin").reset();
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
                tipo:"required",
                clave:{required:true, minlength:6},
                conf:{required:true, minlength:6, equalTo:"#clave"}
            },
            messages:
            {
                nombre:"Indique el campo",
                email:{required:"Indique el campo", email:"Formato incorrecto"},
                tipo:"Indique el campo",
                clave:{required:"Indique el campo", minlength:"Minimo 6 caracteres"},
                conf:{required:"Indique el campo", minlength:"Minimo 6 caracteres", equalTo:"Deben coincidir las contraseñas"}
            }
        });
    });
</script>