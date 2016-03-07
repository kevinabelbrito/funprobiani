<section id="frontpage-header">
    <div class="row">
        <div class="small-16 large-8 columns">
          <div id="login">
          <h3>Olvide mi contraseña <span data-tooltip class="has-tip tip-left" title="Ingresa tu email para recuperar la contraseña">(?)</span></h3>
            <form id="clave_form">
              <div data-alert class="alert-box success radius">
                La contraseña fue enviada a tu email exitosamente.
              </div>
              <div data-alert class="alert-box alert radius"></div>
              <input type="email" placeholder="Ingresa tu Correo Electronico" name="email" id="email" title="Correo Electrónico"/>
              <button type="submit" name="submit" class="button radius">Enviar</button>
              <!--
                - When using the actual form remove the link below and use the above button (commented out) -
                - This is simply a way of linking to the actual backpage -
              -->
              <!--<a href="pet-file-1.html" class="button radius">Login</a>-->
            </form>
          </div>
        </div>
        <div class="small-16 large-8 columns" id="frontpage-il">
            <h1 class="text-center">¿No tienes cuenta?</h1>
            <img src="<?= base_url() ?>assets/images/illustrations/frontpage.png">
            <a href="<?= base_url() ?>home/singin" class="button radius">Registrate</a>
        </div>
    </div>
</section>

<script>
    $(function(){
        $(".success").hide();
        $(".alert").hide();
        $("#clave_form").validate({
            submitHandler:function(){
              var str = $("#clave_form").serialize();
              $.post("<?= base_url() ?>home/recuperar", str, success_data).error(error_data);
              function success_data(data)
              {
                if (data == "bien")
                {
                  $(".success").show(200).delay(5000).hide(500);
                  window.location = "<?= base_url() ?>home/login";
                }
                else
                {
                  $(".alert").html(data).show(200).delay(5000).hide(500);
                  jQuery.fn.reset = function(){
                      $(this).each(function(){ this.reset(); });
                  }
                  $("#clave_form").reset();
                  $("#email").focus();
                }
              }
              function error_data()
              {
                $(".alert").html("No fue posible conectar con el servidor.").show(200).delay(5000).hide(500);
              }
            },
            rules:
            {
                email:{required:true, email:true}
            },
            messages:{
                email:
                {
                    required:"Indique el campo",
                    email:"Formato incorrecto"
                }
            }
        });
    });
</script>