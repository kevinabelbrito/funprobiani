<section id="frontpage-header">
      <div class="row">

        <div class="small-16 large-9 columns">
          <ul id="slider" data-orbit data-options="animation_speed:1500; timer_speed: 6000; navigation_arrows: true; slide_number: false; bullets: false; resume_on_mouseout: true;">
            <li>
              <img src="<?= base_url() ?>assets/images/photos/funprobiani.jpg"/>
              <div class="orbit-caption">
                <p>
                  Bienvenidos a Funprobiani<br/>
                  <span>Fundación protectora de animales</span>
                </p>
              </div>
            </li>
            <li>
              <img src="<?= base_url() ?>assets/images/photos/adopta.jpg"/>
              <div class="orbit-caption">
                <p>
                  Abandona la soledad<br/>
                  <span><a href="<?= base_url() ?>mascotas/adopta">Adopta un amigo</a></span>
                </p>
              </div>
            </li>
            <li>
              <img src="<?= base_url() ?>assets/images/photos/dona.jpg" alt="slide 3" />
              <div class="orbit-caption">
                <p>
                  Cualquier aporte siempre será bien recibido<br/>
                  <span><a href="<?= base_url() ?>home/doanciones">Realiza una donación</a></span>
                </p>
              </div>
            </li>
          </ul>
        </div>
        <!--//slider-->

        <div class="small-16 large-7 columns">
          <div id="login">
            <?php if($this->session->userdata('tipo') == "") { ?>
            <h3>Iniciar Sesión <span data-tooltip class="has-tip tip-left" title="Si ya te encuentras registrado inicia sesión aquí">(?)</span></h3>
            <form id="login_form">
              <div data-alert class="alert-box success radius">
                Ha iniciado sesion exitosamente.
              </div>
              <div data-alert class="alert-box alert radius">
              </div>
              <input type="email" placeholder="Ingresa tu Correo Electronico" name="email" id="email" title="Correo Electrónico"/>
              <input type="password" placeholder="Tu Contraseña" name="password" id="password" title="Contraseña"/>
              <button type="submit" name="submit" class="button radius">Login</button>
              <a href="<?= base_url() ?>home/recuperar" class="pass-reset">¿Olvidaste tu contraseña?</a>
            </form>
            <?php
            }
            elseif($this->session->userdata('tipo') == "admin")
            {
            ?>
            <h3><?= $this->session->userdata('nombre') ?></h3>
            <strong><span class="icon-mail"></span><?= $this->session->userdata('email') ?></strong>
            <strong><span class="icon-user"></span><?= $this->session->userdata('tipo_admin') ?></strong>
            <div id="loginout" class="text-center">
              <a href="<?= base_url() ?>admin" title="Panel Administrativo"><span class="icon-lock"></span></a>
              <a href="<?= base_url() ?>home/logout" title="Cerrar Sesión"><span class="icon-log-out"></span></a>
            </div>
            <?php
            }
            else
            {
            ?>
            <h3><?= $this->session->userdata('nombre') ?></h3>
            <img src="<?= base_url() ?>assets/images/personas/<?= $this->session->userdata('foto') ?>">
            <strong><span class="icon-user"></span><?= $this->session->userdata('tipo_persona') ?></strong>
            <strong><span class="icon-v-card"></span><?= $this->session->userdata('cedula') ?></strong>
            <strong><span class="icon-mail"></span><?= $this->session->userdata('email') ?></strong>
            <strong><span class="icon-phone"></span><?= $this->session->userdata('tlf') ?></strong>
            <div id="loginout" class="text-center">
              <a href="<?= base_url() ?>home/perfiles" title="Perfiles"><span class="icon-user"></span></a>
              <a href="<?= base_url() ?>home/logout" title="Cerrar Sesión"><span class="icon-log-out"></span></a>
            </div>
            <?php } ?>
          </div>
        </div>

      </div>
    </section>

    <div class="row">
      <div class="large-16 columns">
        <img src="<?= base_url() ?>assets/images/large_sep.png" alt="spliter" class="large-spliter" />
      </div>
    </div>

    <div class="row">
      <div class="small-16 large-8 columns">
        <section id="blog-highlights" class="large-text-left small-text-center">
          <h1>La Fundación</h1>
          <article>
            <header>
              <h2><a href="#">¿Quiénes pueden ayudar?</a></h2>
            </header>
            <p>Todas aquellas personas que amen a los animales, que no asistan a eventos donde ninguna especie sea maltratada. Deben estar dispuestas a aportar conocimientos con el fin de ayudar a los animales</p>
            <a class="read-more" href="<?= base_url() ?>home/ayuda">Mas Información</a>
          </article>
          <img src="<?= base_url() ?>assets/images/small_sep.png" alt="spliter" class="small-spliter" />
          <article>
            <header>
              <h2>Nuestras creencias</h2>
            </header>
            <p>La Fundación insiste en que todos los animales bajo la tenencia o el cuidado de los humanos deben mantenerse en condiciones apropiadas para las necesidades de las especies.</p>
            <a class="read-more" href="<?= base_url() ?>home/creencias">Mas Información</a>
          </article>
          <img src="<?= base_url() ?>assets/images/small_sep.png" alt="spliter" class="small-spliter" />
          <article>
            <header>
              <h2>Criterios Generales</h2>
            </header>
            <p>La diferencia clave entre la conservación y el bienestar animal es que la primera se enfoca en las especies, poblaciones y hábitats, mientras que el bienestar se enfoca en el animal individual.</p>
            <a class="read-more" href="<?= base_url() ?>home/criterios">Mas Información</a>
          </article>
          <img src="<?= base_url() ?>assets/images/small_sep.png" alt="spliter" class="small-spliter" />
          <article>
            <header>
              <h2>Nuestras necesidades inmediatas.</h2>
            </header>
            <p>Tener una sede principal, recibir ayuda de organismos publicos y privados para la realización de las diferentes actividades de la fundación, así como el apoyo de un ente judicial para la denuncia del maltrato animal.</p>
            <a class="read-more" href="<?= base_url() ?>home/necesidades">Mas Información</a>
          </article>
        </section>
      </div>

      <div class="small-16 large-7 large-offset-1 columns" id="frontpage-il">
        <h1 class="text-center">¿Adoras a los animales?</h1>
        <img src="<?= base_url() ?>assets/images/illustrations/dog.png" alt="vet and dog">
        <a href="<?= base_url() ?>mascotas/adopta" class="button radius">Adopta</a>
        <br>
        <br>
        <h1 class="text-center">¿Tienes recursos?</h1>
        <img src="<?= base_url() ?>assets/images/illustrations/dona.png" alt="Dona">
        <a href="<?= base_url() ?>home/donaciones" class="button radius">Dona</a>
      </div>
    </div>
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
                      window.location = "<?= base_url() ?>";
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