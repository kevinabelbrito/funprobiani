<section id="team" class="blue">
    <div class="row">
       <h1 class="text-center title">Ingrese todos sus datos personales</h1>
        <form id="new_people" enctype="multipart/form-data">
            <div class="small-16 large-8 columns">
                <label for="tipo">Tipo de Registro</label>
                <select name="tipo" id="tipo">
                    <option value="<?= $tipo ?>"><?= $tipo ?></option>
                    <option value="Usuario">Usuario</option>
                    <option value="Voluntario">Voluntario</option>
                    <option value="Hogar temporal">Hogar temporal</option>
                </select>
                <input type="text" placeholder="Nombres y Apellidos" name="nombre" name="nombre" maxlength="100" title="Nombres y Apellidos" value="<?= $nombre ?>"/>
                <label for="userfile">Fotografía</label><input type="file" name="userfile" id="userfile" placeholder="Fotografia" title="Fotografia">
                <input type="text" name="cedula" id="cedula" placeholder="Cedula de Identidad: V-12345678" title="Cedula de Identidad" maxlength="10" value="<?= $cedula ?>">
                <label for="fenac">Fecha de Nacimiento</label>
                <input type="date" name="fenac" id="fenac" placeholder="Año/Mes/Dia" value="<?= $fenac ?>">
                <input type="tel" name="tlf" id="tlf" placeholder="Numero de Celular: 04XX1234567" title="Numero de Celular" maxlength="11" value="<?= $tlf ?>">
                <input type="email" name="email" id="email" placeholder="Correo Electrónico" title="Correo Electrónico" maxlength="80" value="<?= $email ?>">
                <textarea name="dir" id="dir" cols="30" rows="2" placeholder="Dirección de la Vivienda" title="Dirección de la Vivienda"><?= $dir ?></textarea>
            </div>
            <div class="small-16 large-8 columns">
                <label for="edo_civil">Estado Civil</label>
                <select name="edo_civil" id="edo_civil">
                    <option value="<?= $edo_civil ?>"><?= $edo_civil ?></option>
                    <option value="Soltero">Soltero</option>
                    <option value="Casado">Casado</option>
                    <option value="Concubinato">Concubinato</option>
                    <option value="Divorciado">Divorciado</option>
                    <option value="Viudo">Viudo</option>
                </select>
                <label for="viv" id="label_viv">Tipo de Vivienda</label>
                <select name="viv" id="viv">
                    <option value="<?= $viv ?>"><?= $viv ?></option>
                    <option value="Propia">Propia</option>
                    <option value="Alquilada">Alquilada</option>
                    <option value="Opcion a compra">Opcion a compra</option>
                    <option value="Invasion">Invasion</option>
                </select>
                <input type="text" name="nro_casa" id="nro_casa" placeholder="Numero. de Casa" title="Numero de Casa" maxlength="5" value="<?= $nro_casa ?>">
                <input type="tel" name="tlf_local" id="tlf_local" placeholder="Telefono de la casa" maxlength="11" value="<?= $tlf_local ?>">
                <textarea name="dir_hogar" id="dir_hogar" cols="30" rows="4" placeholder="Dirección del Hogar Temporal" title="Dirección del Hogar Temporal"><?= $dir_hogar ?></textarea>
            </div>
            <div class="small-16 columns text-center">
                <div data-alert class="alert-box success radius"></div>
                <div data-alert class="alert-box alert radius"></div>
                <button class="button radius">Guardar Cambios</button>
                <a href="<?= base_url() ?>home/perfiles" class="button radius">Cancelar</a>
            </div>
        </form>
    </div>
</section>
<section id="contact-callout">
    <div class="row">
        <div class="small-16 columns" id="frontpage-il">
            <h1 class="text-center">Mucho tiempo con la misma contraseña?</h1>
            <img src="<?= base_url() ?>assets/images/illustrations/frontpage.png">
            <a href="<?= base_url() ?>home/login" class="button radius">Cambiar Contraseña</a>
        </div>
    </div>
</section>
<script>
  $(function(){
      $(".success").hide();
      $(".alert").hide();
      function verificar_tipo()
      {
          if($("#tipo").val() == "Hogar temporal")
          {
              $("#label_viv").show();
              $("#viv").show();
              $("#nro_casa").show();
              $("#tlf_local").show();
              $("#dir_hogar").show();
          }
          else
          {
              $("#label_viv").hide();
              $("#viv").val("").hide();
              $("#nro_casa").val("").hide();
              $("#tlf_local").val("").hide();
              $("#dir_hogar").val("").hide();
          }
      }
      verificar_tipo();
      $("#tipo").change(function(){
        verificar_tipo();
      });
      $("#new_people").validate({
          submitHandler:function(){
              var formData = new FormData(document.getElementById("new_people"));
              $.ajax({
                url: "<?= base_url() ?>personas/editar",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false
              })
              .done(success_data)
              .fail(error_data);
              function success_data(data)
              {
                  if(data == "bien")
                  {
                      jQuery.fn.reset = function(){
                          $(this).each(function(){ this.reset(); });
                      }
                      $("#new_people").reset();
                      $(".success").html("Has cambiado tus datos de forma exitosa.").show(200).delay(5000).hide(500);
                      window.location = "<?= base_url() ?>home/perfiles";
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
              tipo:"required",
              nombre:"required",
              userfile:{extension:"jpg|png"},
              cedula:{required:true, minlength:7},
              fenac:{required:true, date:true},
              tlf:{required:true, digits:true, minlength:11},
              email:{required:true, email:true},
              dir:{required:true, minlength:15},
              edo_civil:"required",
              viv:
              {
                required:function(element){
                  return $("#tipo").val() == "Hogar temporal";
                }
              },
              nro_casa:
              {
                required:function(element){
                  return $("#tipo").val() == "Hogar temporal";
                }
              },
              tlf_local:
              {
                required:function(element){
                  return $("#tipo").val() == "Hogar temporal";
                },
                digits:true,
                minlength:11
              },
              dir_hogar:
              {
                required:function(element){
                  return $("#tipo").val() == "Hogar temporal";
                },
                minlength:15
              },
              clave:{required:true, minlength:6},
              conf:{required:true, minlength:6, equalTo:"#clave"}
          },
          messages:
          {
              tipo:"Indique el campo",
              nombre:"Indique el campo",
              userfile:{extension:"solo se admiten los siguientes formatos: jpg|png"},
              cedula:{required:"Indique el campo", minlength:"No parece una cedula"},
              fenac:{required:"Indique el campo", date:"No es una fecha correcta"},
              tlf:{required:"Indique el campo", digits:"Solo numeros enteros", minlength:"No es un numero telefonico valido"},
              email:{required:"Indique el campo", email:"Formato incorrecto"},
              dir:{required:"Indique el campo", minlength:"Minimo 15 caracteres"},
              edo_civil:"Indique el campo",
              viv:"Indique el campo",
              nro_casa:"Indique el campo",
              tlf_local:{required:"Indique el campo", digits:"Solo numeros enteros", minlength:"No es un numero telefonico valido"},
              dir_hogar:{required:"Indique el campo", minlength:"Minimo 15 caracteres"},
              clave:{required:"Indique el campo", minlength:"Debe tener al menos 6 caracteres"},
              conf:{required:"Indique el campo", minlength:"Debe tener al menos 6 caracteres", equalTo:"Deben coincidir las contraseñas"}
          }
      });
  });
</script>