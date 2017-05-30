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
    <!-- Datatables -->
    <link href="/tema/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/tema/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/tema/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/tema/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/tema/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <link href="/tema/build/css/custom.min.css" rel="stylesheet">

    <style type="text/css">
        .error {
            color: red
        }
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ url('gestor/') }}" class="site_title"><i class="fa fa-paw"></i> <span>AVA SDR!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="{{ asset('tema/production/images/img.jpg') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bem-vindo,</span>
                <h2>{{ auth('gestor')->user()->name}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            @include('layouts.gestor.sidemenu')


          </div>
        </div>

        @include('layouts.gestor.top-navegation')

        <!-- page content -->
        <div class="right_col" role="main">
            @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Todos os direitos reservados AVA SDR
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

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
    <!-- Colorbox -->
    <script src="/tema/vendors/jquery-colorbox/jquery.colorbox-min.js"></script>
    <!-- Input Mask -->
    <script src="/tema/vendors/jquery.inputmask/dist/min/inputmask/inputmask.min.js"></script>
    <script src="/tema/vendors/jquery.inputmask/dist/min/inputmask/inputmask.extensions.min.js"></script>
    <script src="/tema/vendors/jquery.inputmask/dist/min/inputmask/jquery.inputmask.min.js"></script>
    <script src="/tema/vendors/bootstrap-typeahead/bootstrap-typeahead.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('tema/build/js/custom.min.js') }}"></script>
    <!-- validator -->
    <script src="/tema/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="/tema/vendors/jquery-validation/dist/localization/messages_pt_BR.min.js"></script>
    <!-- Datatables -->
    <script src="/tema/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/tema/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/tema/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/tema/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="/tema/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/tema/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/tema/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/tema/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/tema/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/tema/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/tema/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/tema/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="/tema/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/tema/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/tema/vendors/pdfmake/build/vfs_fonts.js"></script>


    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
      $(document).ready(function(){
        //colorbox
        $(".iframe").colorbox({
            iframe: true,
            width: "90%",
            height: "90%"
        });
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

        // AutoComplete Pai e Mãe
        $('#pai').typeahead({
         source: function(q, process) {
            objects = [];
            map = {};
            // requisição ajax
            return $.get("/gestor/responsavel/consulta/pai",
                {
                    query: q
                }, function (data) {
                    objects = [];
                    $.each(data, function(i, object) {
                        var chave = object.nome + " CPF: " + object.cpf;
                        map[chave] = object;
                        objects.push(chave);
                    });
                    return process(objects);
                });
            // fim ajax
            process(objects);
            },
            updater: function(item)
            {
                $("#pai_id").val(map[item].id);
                return item;
            }
        });
        // AutoCompleteMãe
        $('#mae').typeahead({
         source: function(q, process) {
            objects = [];
            map = {};
            // requisição ajax
            return $.get("/gestor/responsavel/consulta/mae",
                {
                    query: q
                }, function (data) {
                    objects = [];
                    $.each(data, function(i, object) {
                        var chave = object.nome + " CPF: " + object.cpf;
                        map[chave] = object;
                        objects.push(chave);
                    });
                    return process(objects);
                });
            // fim ajax
            process(objects);
            },
            updater: function(item)
            {
                $("#mae_id").val(map[item].id);
                return item;
            }
        });

        <?php $type = isset($type) ? $type : '';?>
        var oTable;
        oTable = $('#table-data').DataTable({
            "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
            "sPaginationType": "full_numbers",
            "oLanguage": {
                "sProcessing": "Processando",
                "sLengthMenu": "",
                "sZeroRecords": "Nenhum resultado",
                "sInfo": "",
                "sEmptyTable": "Tabela vazia",
                "sInfoEmpty": "Vazio",
                "sInfoFiltered": "Filtro",
                "sInfoPostFix": "",
                "sSearch": "Pesquisar:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Inicio",
                    "sPrevious": "Anterior",
                    "sNext": "Próximo",
                    "sLast": "Último"
                }
            },
            "processing": true,
            "serverSide": true,
            "ajax": "{{ url('gestor/'.$type.'/data') }}",
            "fnDrawCallback": function (oSettings) {



                $(".iframe").colorbox({
                    iframe: true,
                    width: "90%",
                    height: "90%",
                    onClosed: function () {
                        oTable.ajax.reload();
                    }
                });

            }
        });

      });
    </script>
    @yield('scripts')
  </body>
</html>
