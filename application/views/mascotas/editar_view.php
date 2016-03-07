<div class="container">
    <div class="row">
        <h2 class="title text-center">Editar datos de la mascota</h2>
        <form id="new_pet">
            <div data-alert class="alert-box success radius">
                Los datos se han guardado con éxito.
            </div>
            <div data-alert class="alert-box alert radius"></div>
            <div class="large-8 small-16 columns">
                <input type="text" name="nombre" id="nombre" placeholder="Nombre de la Mascota" title="Nombre de la Mascota" value="<?= $nombre ?>">
                <input type="text" name="edad" id="edad" title="Edad Aproximada" placeholder="Edad Aproximada" value="<?= $edad ?>">
                <input type="text" name="peso" id="peso" placeholder="Peso (Kg.)" title="Peso" value="<?= $peso ?>">
                <label for="especie">Especie</label>
                <select name="especie" id="especie">
                    <option value="<?= $especie ?>"><?= $especie ?></option>
                    <option value="Perro">Perro</option>
                    <option value="Gato">Gato</option>
                    <option value="Otras especies">Otras especies</option>
                </select>
                <label for="foto">Fotografía</label>
                <input type="file" name="userfile" id="foto">
            </div>
            <div class="large-8 small-16 columns">
                <label for="sexo">Sexo de la Mascota</label>
                <select name="sexo" id="sexo">
                    <option value="<?= $sexo ?>"><?= $sexo ?></option>
                    <option value="Hembra">Hembra</option>
                    <option value="Macho">Macho</option>
                </select>
                <label for="vacunado">¿Ya ha sido Vacunado?</label>
                <select name="vacunado" id="vacunado">
                    <option value="<?= $vacunado ?>"><?= $vacunado ?></option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
                <label for="esterilizado">¿Está esterilizado?</label>
                <select name="esterilizado" id="esterilizado">
                    <option value="<?= $esterilizado ?>"><?= $esterilizado ?></option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
                <textarea name="descripcion" id="descripcion" cols="20" rows="5" placeholder="Escriba una breve descripción acerca del animal" title="Descripción"><?= $descripcion ?></textarea>
            </div>
            <div class="small-16 columns text-center">
                <button class="button radius">Guardar Cambios</button>
                <a href="<?= base_url() ?>mascotas/perfil/<?= $id ?>" class="button radius">Cancelar</a>
            </div>
        </form>
    </div>
    <div id="contact-callout">
       <div class="row">
           <img src="<?= base_url() ?>assets/images/large_sep.png" alt="spliter" class="large-spliter" />
       </div>
        <div class="row">
            <div class="small-16 columns" id="frontpage-il">
                <img src="<?= base_url() ?>assets/images/illustrations/dog.png">
                <a href="<?= base_url() ?>mascotas" class="button radius">Mascotas Inscritas</a>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $(".success").hide();
        $(".alert").hide();
        $("#new_pet").validate({
            submitHandler:function(){
                var formData = new FormData(document.getElementById("new_pet"));
                $.ajax({
                    url: "<?= base_url() ?>mascotas/editar/<?= $id ?>/<?= $foto ?>",
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
                  if (data == "bien")
                  {
                    $(".success").show(200).delay(5000).hide(500);
                    window.location = "<?= base_url() ?>mascotas/perfil/<?=$id ?>";
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
                edad:{required:true, minlength:5},
                peso:{required:true, number:true, min:0},
                especie:"required",
                userfile:{extension:"jpg|png"},
                sexo:"required",
                vacunado:"required",
                esterilizado:"required",
                descripcion:{required:true, minlength:10}
            },
            messages:
            {
                nombre:"Indique el campo",
                edad:{required:"Indique el campo", minlength:"Minimo 5 caracteres"},
                peso:{required:"Indique el campo", number:"Solo numeros", min:"Solo valores positivos"},
                especie:"Indique el campo",
                userfile:{extension:"Solo se admiten los siguientes formatos: jpg|png"},
                sexo:"Indique el campo",
                vacunado:"Indique el campo",
                esterilizado:"Indique el campo",
                descripcion:{required:"Indique el campo", minlength:"No sea tan breve, por favor"}
            }
        });
    });
</script>