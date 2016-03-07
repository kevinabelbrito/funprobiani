<section id="contact" class="blue">
    <div class="row">

      <div class="small-16 columns">
        <h1 class="text-center title">Contactanos</h1>
        <p></p>
      </div>

    </div>

    <div class="row">

      <div class="small-16 medium-8 columns">
        <div id="contact-form">
          <div id="fields">
            <form id="contact_form">
              <div data-alert class="alert-box success radius">
                Su mensaje ha sido enviado, este atento a nuestra respuesta.
              </div>
              <div data-alert class="alert-box alert radius">
                No fue posible conectar con el servidor.
              </div>
              <input type="text" name="nombre" title="Nombres y Apellidos" placeholder="Indica tus Nombres y Apellidos"/>
              <input type="email" name="email" title="Tu e-mail" placeholder="Danos tu Correo Electrónico"/>
              <textarea name="msj" title="Tu Mensaje" placeholder="Escribe un Mensaje"></textarea>
              <input type="submit" name="submit" value="Enviar" class="button radius" />
            </form>
          </div>
          <div id="note"></div>
        </div><!--contact-form-->

        <!--<div class="ui-alerts">
          <div data-alert class="alert-box success radius">
            This is a success alert.
            <a href="#" class="close">&times;</a>
          </div>

          <div data-alert class="alert-box warning radius">
            This is a information alert.
            <a href="#" class="close">&times;</a>
          </div>

          <div data-alert class="alert-box alert radius">
            This is an error alert.
            <a href="#" class="close">&times;</a>
          </div>
        </div>-->

      </div>

      <div class="small-16 medium-7 medium-offset-1 columns">
        <h4>Medios de Contacto</h4>
        <div class="vcard">
          <p>
              <span class="icon-mail"></span> funprobiani@gmail.com
              <br>
              <span class="icon-old-phone"></span> 0424-9441482
              <br>
              <span class="icon-phone"></span> 0412834537 / 04128796704
          </p>
        </div>
        <h4>Horario de Atención</h4>
        <div class="vcard">
          <p>Estamos Disponibles las 24 horas del día.</p>
        </div>
        <h4>Redes Sociales</h4>
        <div class="vcard">
            <p>
              <a href="https://www.facebook.com/funprobiani.enaccion" target="_blank" title="Funprobiani En Acción"><span class="icon-facebook"></span></a>
              <a href="https://instagram.com/funprobiani/" target="_blank" title="@funprobiani"><span class="icon-instagram"></span></a>
              <a href="https://twitter.com/FUNPROBIANI" target="_blank" title="@FUNPROBIANI"><span class="icon-twitter"></span></a>
            </p>
        </div>
      </div>

    </div>
  </section>

  <!--<section id="map">
    <div class="row">
      <div class="small-16 columns">
        <h1>¿Donde estamos ubicados?</h1>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3003.970013683921!2d-8.62357476697908!3d41.15700565305515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-PT!2spt!4v1400503488062"  frameborder="0" style="border:0"></iframe>
      </div>
    </div>
  </section>-->

  <script>
        $(function(){
            $(".success").hide();
            $(".alert").hide();
            $("#contact_form").validate({
                submitHandler:function(){
                  var str = $("#contact_form").serialize();
                  $.post("", str, success_data).error(error_data);
                  function success_data(data)
                  {
                    $(".success").show(200).delay(10000).hide(500);
                  }
                  function error_data()
                  {
                    $(".alert").show(200).delay(5000).hide(500);
                  }
                },
                rules:
                {
                    nombre:"required",
                    email:{required:true, email:true},
                    msj:{required:true, minlength:15}
                },
                messages:
                {
                    nombre:"Indique el campo",
                    email:{required:"Indique el campo", email:"Formato Incorrecto"},
                    msj:{required:"Indique el campo", minlength:"Escriba al menos 15 caracteres"}
                }
            });
        });
    </script>