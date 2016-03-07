<section id="team" class="blue">
    <div class="row">
       <h1 class="text-center title">Donación Financiera</h1>
        <div class="small-16 large-8 columns">
            <form id="financiera_form">
                <div data-alert class="alert-box success radius">
                    La donación fue realizada con éxito, Gracias por tu contribución.
                </div>
                <div data-alert class="alert-box alert radius">
                    No fue posible conectar con el servidor.
                </div>
                <input type="text" name="descripcion" id="descripcion" placeholder="Nro. de Transacción Bancaria" title="Indique el nro de transaccion bancaria">
                <input type="text" name="cantidad" id="cantidad" placeholder="Monto" title="Cantidad de dinero a donar">
                <button class="radio button">Donar</button>
            </form>
        </div>
        <div class="small-16 large-8 columns" id="frontpage-il">
            <p>
              Datos de cuenta bancaria:
              <br>
              Banco Mercantil.
              <br>
              Nro. de Cuenta: 01050054171054441847
              <br>
              Tipo de Cuenta: Corriente.
              <br>
              Beneficiario: FUNPROBIANI.
              <br>
              RIF: J-29853668-3
              <br>
              Correo: funprobiani@gmail.com
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
        $("#financiera_form").validate({
            submitHandler:function(){
                var str = $("#financiera_form").serialize();
                $.post("<?= base_url() ?>donaciones/financiera", str, success_data).error(error_data);
                function success_data(data)
                {
                  $(".success").show(200).delay(10000).hide(500);
                  jQuery.fn.reset = function(){
                      $(this).each(function(){ this.reset(); });
                  }
                  $("#financiera_form").reset();
                  $("#descripcion").focus();
                }
                function error_data()
                {
                  $(".alert").show(200).delay(5000).hide(500);
                }
            },
            rules:
            {
                descripcion:{required:true, digits:true},
                cantidad:{required:true, number:true, min:1}
            },
            messages:
            {
              descripcion:{required:"Indique el campo", digits:"Solo numeros enteros"},
                cantidad:{required:"Indique el campo", number:"Indique solo valores numericos", min:"Indique un monto mayor a 0"}
            }
        });
    });
</script>