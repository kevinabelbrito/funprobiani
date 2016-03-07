<section id="team" class="blue">
    <div class="row">
       <h1 class="text-center title">Donación Material</h1>
        <div class="small-16 large-8 columns">
            <form id="material_form">
                <div data-alert class="alert-box success radius">
                    La donación fue realizada con éxito, Gracias por tu contribución.
                </div>
                <div data-alert class="alert-box alert radius">
                    No fue posible conectar con el servidor.
                </div>
                <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion" title="Describa su donación">
                <input type="number" name="cantidad" id="cantidad" placeholder="cantidad" title="Cantidad del producto a donar">
                <button class="radio button">Donar</button>
            </form>
        </div>
        <div class="small-16 large-8 columns" id="frontpage-il">
            <p>
              Algunos materiales que puedes donar:
              <br>
              Perrarinas
              <br>
              Platos
              <br>
              Shampoo
              <br>
              Peines
              <br>
              Vacunas
              <br>
              Medicamentos
              <br>
              Entre otros...
            </p>
        </div>
    </div>
</section>

<section id="contact-callout">
  <div class="row">
    <div class="small-16 medium-12 columns">
      <h1>¿Tienes alguna duda?</h1>
      <p>Puedes comunicarte con nosotros por los telefonos que vez en pantalla o escribirnos directamente a nuestro correo electrónico funprobiani@gmail.com, estamos siempre dispuestos a resolver cualquier duda que tengas.
      </p>
      <a href="<?= base_url() ?>home/contactanos" class="button radius">Contactanos</a>
    </div>
    <div class="medium-4 columns">
      <img src="<?= base_url() ?>assets/images/illustrations/callout.png" alt="vet hello">
    </div>
  </div>
</section>
<script>
    $(function(){
        $(".success").hide();
        $(".alert").hide();
        $("#material_form").validate({
            submitHandler:function(){
                var str = $("#material_form").serialize();
                $.post("<?= base_url() ?>donaciones/material", str, success_data).error(error_data);
                function success_data(data)
                {
                  $(".success").show(200).delay(10000).hide(500);
                  jQuery.fn.reset = function(){
                      $(this).each(function(){ this.reset(); });
                  }
                  $("#material_form").reset();
                  $("#descripcion").focus();
                }
                function error_data()
                {
                  $(".alert").show(200).delay(5000).hide(500);
                }
            },
            rules:
            {
                descripcion:"required",
                cantidad:{required:true, digits:true, min:1}
            },
            messages:
            {
              descripcion:"Indique el campo",
                cantidad:{required:"Indique el campo", digits:"Solo numeros enteros", min:"Indique al menos una unidad"}
            }
        });
    });
</script>