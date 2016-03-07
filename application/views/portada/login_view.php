<section id="frontpage-header">
    <div class="row">
        <div class="small-16 large-8 columns">
          <div id="login">
          <h3>Iniciar Sesión <span data-tooltip class="has-tip tip-left" title="Si ya te encuentras registrado inicia sesión aquí">(?)</span></h3>
            <form id="login_form">
              <div data-alert class="alert-box success radius">
                Ha iniciado sesion exitosamente.
              </div>
              <div data-alert class="alert-box alert radius"></div>
              <input type="email" placeholder="Ingresa tu Correo Electronico" name="email" id="email" title="Correo Electrónico"/>
              <input type="password" placeholder="Tu Contraseña" name="password" id="password" title="Contraseña"/>
              <input type="hidden" name="link" id="link" value="<?= $link ?>">
              <button type="submit" name="submit" class="button radius">Login</button>

              <!--
                - When using the actual form remove the link below and use the above button (commented out) -
                - This is simply a way of linking to the actual backpage -
              -->
              <!--<a href="pet-file-1.html" class="button radius">Login</a>-->

              <a href="<?= base_url() ?>home/recuperar" class="pass-reset">¿Olvidaste tu contraseña?</a>
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
        $("#login_form").validate({
            submitHandler:function(){
              var str = $("#login_form").serialize();
              $.post("<?= base_url() ?>home/login", str, success_data).error(error_data);
              function success_data(data)
              {
                if (data == "persona")
                {
                  $(".success").show(200).delay(5000).hide(500);
                  var link = $("#link").val();
                  window.location = "<?= base_url() ?>" + link;
                }
                else if(data == "admin")
                {
                  $(".success").show(200).delay(5000).hide(500);
                  window.location = "<?= base_url() ?>admin/";
                }
                else
                {
                  $(".alert").html(data).show(200).delay(5000).hide(500);
                  jQuery.fn.reset = function(){
                      $(this).each(function(){ this.reset(); });
                  }
                  $("#login_form").reset();
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
                email:{required:true, email:true},
                password:"required"
            },
            messages:{
                email:
                {
                    required:"Indique el campo",
                    email:"Formato incorrecto"
                },
                password:"Indique el campo"
            }
        });
    });
</script>