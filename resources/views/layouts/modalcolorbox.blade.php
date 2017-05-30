<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AVA SDR </title>

    <!-- Bootstrap -->
    <link href="{{ asset('tema/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('tema/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('tema/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('tema/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('tema/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('tema/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <!-- Switchery -->
    <link href="/tema/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="/tema/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('tema/build/css/custom.min.css') }}" rel="stylesheet">
    <!-- Toggle -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="/tema/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Colorbox -->
    <link href="/tema/vendors/jquery-colorbox/example4/colorbox.css" rel="stylesheet">
    <style type="text/css">
        .error {
            color: red
        }
        body {
          background-color: #FFF;
        }
    </style>
  </head>

  <body class="">


        <!-- page content -->
        <div>
            @yield('content')
        </div>
        <!-- /page content -->


    <!-- jQuery  -->
    <script src="{{ asset('tema/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('tema/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('tema/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('tema/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('tema/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('tema/vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('tema/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('tema/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('tema') }}/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="{{ asset('tema/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('tema/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('tema/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('tema/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('tema/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('tema/production/js/flot/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('tema/production/js/flot/date.js') }}"></script>
    <script src="{{ asset('tema/production/js/flot/jquery.flot.spline.js') }}"></script>
    <script src="{{ asset('tema/production/js/flot/curvedLines.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('tema/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('tema/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('tema/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('tema/production/js/moment/moment.min.js') }}"></script>
    <script src="{{ asset('tema/production/js/datepicker/daterangepicker.js') }}"></script>

    <!-- Select2 -->
    <script src="/tema/vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Input Mask -->
    <script src="/tema/vendors/jquery.inputmask/dist/min/inputmask/inputmask.min.js"></script>
    <script src="/tema/vendors/jquery.inputmask/dist/min/inputmask/inputmask.extensions.min.js"></script>
    <script src="/tema/vendors/jquery.inputmask/dist/min/inputmask/jquery.inputmask.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('tema/build/js/custom.min.js') }}"></script>
    <!-- validator -->
    <script src="/tema/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="/tema/vendors/jquery-validation/dist/localization/messages_pt_BR.min.js"></script>

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
      $(document).ready(function(){

        //Adiciona o método de validar datas
        $.validator.addMethod(
             "date",
             function(value, element) {
                  var check = false;
                  var re = /^\d{1,2}\/\d{1,2}\/\d{4}$/;
                  if( re.test(value)){
                       var adata = value.split('/');
                       var gg = parseInt(adata[0],10);
                       var mm = parseInt(adata[1],10);
                       var aaaa = parseInt(adata[2],10);
                       var xdata = new Date(aaaa,mm-1,gg);
                       if ( ( xdata.getFullYear() == aaaa ) && ( xdata.getMonth () == mm - 1 ) && ( xdata.getDate() == gg ) )
                            check = true;
                       else
                            check = false;
                  } else
                       check = false;
                  return this.optional(element) || check;
             },
             "Insira uma data válida"
        );
        // Ajusta o erro ao padrão do bootstrap 3
        $.validator.setDefaults({
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function(error, element) {
                if(element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        });

        $('.data').inputmask("99/99/9999");
        $('.cpf').inputmask({mask:"99999999999", placeholder: "" });
        $('.data-calendario').daterangepicker({
              "format": "DD/MM/YYYY",
               "locale": {
                  "format": "DD/MM/YYYY",
                  "separator": " / ",
                  "applyLabel": "Aplicar",
                  "cancelLabel": "Cancelar",
                  "fromLabel": "From",
                  "toLabel": "To",
                  "customRangeLabel": "Custom",
                  "weekLabel": "W",
                  "daysOfWeek": [
                      "D",
                      "S",
                      "T",
                      "Q",
                      "Q",
                      "S",
                      "S"
                  ],
                  "monthNames": [
                      "Janeiro",
                      "Fevereiro",
                      "Março",
                      "Abril",
                      "Maio",
                      "Junho",
                      "Julho",
                      "Agosto",
                      "Setembro",
                      "Outubro",
                      "Novembro",
                      "Dezembro"
                  ],
                  "firstDay": 1
          },
          singleDatePicker: true,
              calender_style: "picker_3"
            });

            $('form').submit(function (event) {
              if ($(this).valid()) {

                $('.has-error').removeClass('has-error');
                $('.help-block').remove();
                event.preventDefault();
                var form = $(this);

                if (form.attr('id') == '' || form.attr('files') != false) {
                  $.ajax({
                    type: form.attr('method'),
                    url: form.attr('action'),
                    data: form.serialize()
                  }).success(function (data) {
                    setTimeout(function () {

                      parent.$.colorbox.close();
                    }, 10);
                  }).fail(function (jqXHR, textStatus, errorThrown) {
                    // Optionally alert the user of an error here...
                    if (jqXHR.status == 403 ) {
                      alert('Não autorizado');
                      setTimeout(function () {
                        parent.$.colorbox.close();
                      }, 10);

                    }
                    var textResponse = jqXHR.responseText;
                    var alertText = "";
                    console.log(textResponse)
                    var jsonResponse = jQuery.parseJSON(textResponse);

                    $.each(jsonResponse, function (n, elem) {
                      $.each(elem, function(index, message) {
                        alertText = alertText +  message + "\n";
                        $("input[name='"+n+"']").parent().addClass('has-error');
                        $("input[name='"+n+"']").parent().append('<span class="help-block">'+message+'</span>');
                      });
                      /*
                      $("input[name='"+elem.campo+"']").parent().addClass('has-error');
                      $("input[name='"+elem.campo+"']").parent().append('<span class="help-block">'+elem.mensagem+'</span>');*/
                    });
                    alert(alertText);
                  });
                }
                else {
                  var formData = new FormData(this);

                  $.ajax({
                    type: form.attr('method'),
                    url: form.attr('action'),
                    data: formData,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData: false
                  }).success(function (data) {

                    setTimeout(function () {
                      parent.$.colorbox.close();
                    }, 10);

                  }).fail(function (jqXHR, textStatus, errorThrown) {
                    // Optionally alert the user of an error here...
                    var textResponse = jqXHR.responseText;
                    var alertText = "Erro de validação :\n\n";
                    var jsonResponse = jQuery.parseJSON(textResponse);

                    $.each(jsonResponse.error, function (n, elem) {

                      $("input[name='"+elem.campo+"']").parent().addClass('has-error');
                      $("input[name='"+elem.campo+"']").parent().append('<span class="help-block">'+elem.mensagem+'</span>')
                      //alertText = alertText + elem + "\n";
                    });

                    alert(alertText);
                  });
                }
                ;
              }//if valid
          });

      });
    </script>
    @yield('scripts')
  </body>
</html>
