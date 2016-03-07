<section id="team" class="blue">
    <div class="row">
        <div class="small-16 columns">
            <h2 class="text-center">Entrevista de Adopción</h2>
            <p>Responda todas las preguntas que se le presentan a continuación, sus respuestas deben tener total veracidad, recuerde que no esta adquiriendo ningun juguete, esta adoptando una mascota, un compañero, un amigo que necesita un hogar para vivir feliz.</p>
        </div>
    </div>
    <form id="entrevista_form">
        <div class="row">
            <div class="medium-8 small-16 columns">
                <img src="<?= base_url() ?>assets/images/large_sep.png" alt="spliter" class="large-spliter" />
                <label for="interes">1.- ¿Cuál es su interés en adoptar una mascota?</label>
                <textarea name="interes" id="interes" cols="30" rows="5"></textarea>
                <img src="<?= base_url() ?>assets/images/large_sep.png" alt="spliter" class="large-spliter" />
                <label for="mascotas">2.- ¿Ha tenido mascotas anteriormente? Explique cuáles y donde están ahora.</label>
                <textarea name="mascotas" id="mascotas" cols="30" rows="5"></textarea>
                <img src="<?= base_url() ?>assets/images/large_sep.png" alt="spliter" class="large-spliter" />
                <label for="esterilizacion">3.- ¿Entiende usted el porqué se realizan las campañas de esterilización? Qué opina?</label>
                <textarea name="esterilizacion" id="esterilizacion" cols="30" rows="5"></textarea>
                <img src="<?= base_url() ?>assets/images/large_sep.png" alt="spliter" class="large-spliter" />
                <label for="personas">4.- ¿Cuántas personas viven con usted? y están todas sinceramente de acuerdo con llevar una mascota a casa?</label>
                <textarea name="personas" id="personas" cols="30" rows="5"></textarea>
                <img src="<?= base_url() ?>assets/images/large_sep.png" alt="spliter" class="large-spliter" />
                <label for="casa">5.- ¿La casa es propia o alquilada?</label>
                <select name="casa" id="casa">
                    <option value="">Seleccione una opción</option>
                    <option value="Propia">Propia</option>
                    <option value="Alquilada">Alquilada</option>
                </select>
                <img src="<?= base_url() ?>assets/images/large_sep.png" alt="spliter" class="large-spliter" />
                <label for="compromiso">6.- ¿Sabe usted que el tener una mascota es un compromiso para toda la vida? que ellos no son desechables ni juguetes de temporada?</label>
                <select name="compromiso" id="compromiso">
                    <option value="">Seleccione una opción</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="medium-8 small-16 columns">
                <img src="<?= base_url() ?>assets/images/large_sep.png" alt="spliter" class="large-spliter" />
                <label for="atencion">7.- ¿Está consciente que ellos merecen un poco de atención, que ellos hacen sus necesidades por ende debe limpiar y que ameritan de educación por parte de Ud. para crear sus costumbres?</label>
                <select name="atencion" id="atencion">
                    <option value="">Seleccione una opción</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
                <img src="<?= base_url() ?>assets/images/large_sep.png" alt="spliter" class="large-spliter" />
                <label for="economico">8.- ¿Está preparado económicamente para mantener una mascota?</label>
                <select name="economico" id="economico">
                    <option value="">Seleccione una opción</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
                <img src="<?= base_url() ?>assets/images/large_sep.png" alt="spliter" class="large-spliter" />
                <label for="responsable">9.- ¿Está usted consciente que a partir de este momento es usted el dueño y responsable del bienestar del adoptado? Consciente que de ahora en adelante debe llevar el control de sus vacunas y costear cualquier asistencia veterinaria que su mascota amerite?</label>
                <select name="responsable" id="responsable">
                    <option value="">Seleccione una opción</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
                <img src="<?= base_url() ?>assets/images/large_sep.png" alt="spliter" class="large-spliter" />
                <label for="veterinario">10.- ¿Tiene o conoce algún veterinario en especifico? cuál?</label>
                <input type="text" name="veterinario" id="veterinaro" maxlength="50">
                <img src="<?= base_url() ?>assets/images/large_sep.png" alt="spliter" class="large-spliter" />
                <label for="vacacion">11.- ¿Dónde o con quién dejaría a su mascota a la hora de salir de vacación?</label>
                <input type="text" name="vacacion" id="vacacion" maxlength="50">
                <img src="<?= base_url() ?>assets/images/large_sep.png" alt="spliter" class="large-spliter" />
                <label for="visitas">12.- ¿Está usted de acuerdo  con las visitas realizadas a la mascota por parte de la fundación? Por qué?</label>
                <textarea name="visitas" id="visitas" cols="30" rows="5"></textarea>
                <img src="<?= base_url() ?>assets/images/large_sep.png" alt="spliter" class="large-spliter" />
                <label for="parametros">13.- ¿Ha leído el compromiso de adopción y conoce los parámetros bajo los cuales trabajamos?</label>
                <select name="parametros" id="parametros">
                    <option value="">Seleccione una opción</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
                <img src="<?= base_url() ?>assets/images/large_sep.png" alt="spliter" class="large-spliter" />
                <label>14.- Descargue la planilla de compromiso de adopción</label>
                <a href="<?= base_url() ?>assets/documents/CompromisoAdopcionModificado.docx" target="_blank" class="button radius">Descargar</a>
            </div>
        </div>
        <div class="row">
            <div class="small-16 columns">
                <img src="<?= base_url() ?>assets/images/large_sep.png" alt="spliter" class="large-spliter" />
                <p>Doy mi palabra que todo lo escrito y dicho durante la entrevista es verdad, prometo amar y proteger a la mascota adoptada. Soy consciente que este es un compromiso y una responsabilidad de por vida.</p>
            </div>
        </div>
        <div class="row">
            <div data-alert class="alert-box success radius">
                La Solicitud de adopción se ha efectuado con éxito.
            </div>
            <div data-alert class="alert-box alert radius">
                No fue posible conectar con el servidor.
            </div>
        </div>
        <div class="row">
            <div class="small-16 columns text-center">
                <button class="button radius">Tramitar adopción</button>
            </div>
        </div>
    </form>
</section>

<section id="contact-callout">
    <div class="row">
       <img src="<?= base_url() ?>assets/images/large_sep.png" alt="spliter" class="large-spliter" />
        <div class="medium-8 small-16 columns" id="frontpage-il">
            <img src="<?= base_url() ?>assets/images/illustrations/dog.png">
            <a href="<?= base_url() ?>mascotas/adopta?mascotas=<?= $especie ?>" class="button radius">Otras Mascotas</a>
        </div>
        <div class="medium-8 small-16 columns" id="frontpage-il">
            <img src="<?= base_url() ?>assets/images/illustrations/horse_mustang.png">
            <a href="<?= base_url() ?>mascotas/adopta" class="button radius">Otras Especies</a>
        </div>
    </div>
</section>
<script>
    $(function(){
        $(".success").hide();
        $(".alert").hide();
        $("#entrevista_form").validate({
            submitHandler:function(){
                var str = $("#entrevista_form").serialize();
                $.post("<?= base_url() ?>adopciones/tramitar/<?= $id_mascota ?>/<?= $especie ?>", str, success_data).error(error_data);
                function success_data(data)
                {
                  $(".success").show(200).delay(10000).hide(500);
                  window.location = "<?= base_url() ?>";
                }
                function error_data()
                {
                  $(".alert").show(200).delay(5000).hide(500);
                }
            },
            rules:
            {
                interes:{required:true, minlength:15},
                mascotas:{required:true, minlength:15},
                esterilizacion:{required:true, minlength:15},
                personas:{required:true, minlength:10},
                casa:"required",
                compromiso:"required",
                atencion:"required",
                economico:"required",
                responsable:"required",
                veterinario:{required:true, minlength:2},
                vacacion:{required:true, minlength:10},
                visitas:{required:true, minlength:15},
                parametros:"required"
            },
            messages:
            {
                interes:{required:"indique el campo", minlength:"Escriba al menos 15 caracteres"},
                mascotas:{required:"indique el campo", minlength:"Escriba al menos 15 caracteres"},
                esterilizacion:{required:"indique el campo", minlength:"Escriba al menos 15 caracteres"},
                personas:{required:"indique el campo", minlength:"Escriba al menos 10 caracteres"},
                casa:"indique el campo",
                compromiso:"indique el campo",
                atencion:"indique el campo",
                economico:"indique el campo",
                responsable:"indique el campo",
                veterinario:{required:"indique el campo", minlength:"Escriba al menos 2 caracteres"},
                vacacion:{required:"indique el campo", minlength:"Escriba al menos 10 caracteres"},
                visitas:{required:"indique el campo", minlength:"Escriba al menos 15 caracteres"},
                parametros:"indique el campo"
            }
        });
    });
</script>