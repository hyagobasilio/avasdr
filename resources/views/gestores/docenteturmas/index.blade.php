@extends('layouts.gestor.template')
@section('content')
<br>
<div class="row">
    <div class="col-md-12">

        <div class="x_panel ">
            <div class="x_title">
                <h2 class="">Relacionamento Docente / Turma</h2>
                <div class="clearfix"></div>
            </div><!-- /.box-header -->
            <div class="x_content">
            <!-- form start -->
            <form id="form-relacionamento-at" class="form-horizontal" method="post"
                  action="{{ url('gestor/docente-turmas/create') }}"
                  autocomplete="off">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <!-- box-body -->
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="docente_id">Docente</label>
                            <select name="docente_id"  id="docente_id" class="form-control">
                                <option value="">Selecione</option>
                                @foreach($docentes as $docente)
                                    <option value="{{ $docente->id }}"> {{ $docente->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                        <div class="col-xs-5">
                            <div class="form-group">
                                <label for="materias">Turmas</label>
                                <select name="materias" size="10" id="materias" multiple="" class="height form-control">
                                    @foreach($turmas as $turma)
                                    <option value="{{ $turma->id }}" > {{ $turma->nome }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <label>Opções</label>
                            <button type="button" id="leftToRight" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                            <button type="button" id="rightToLeft" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                        </div>

                        <div class="col-xs-5">
                            <div class="form-group">
                                <label for="turmas_selecionadas">Turmas Relacionadas</label>
                                <select name="turmas_selecionadas" size="10" id="turmas_selecionadas" multiple="" class="height form-control">
                                </select>
                            </div>
                        </div>
                        <!-- hidden -->
                    <input type="hidden" id="idsTurmas" name="idsTurmas">

                    

                </div><!-- /.box-body -->
                
                <div class="">
                    
                    <a href="{{ url('/') }}" class="btn btn-sm btn-danger close_popup">
                        <span class="glyphicon glyphicon-ban-circle"></span>
                        Cancelar
                    </a>
                    <button type="reset" class="btn btn-sm btn-default">
                        <span class="glyphicon glyphicon-remove-circle"></span>
                        Limpar
                    </button>
                    
                    <a href="#" id="submit" class="btn btn-info pull-right">
                        <span class="glyphicon glyphicon-ok-circle"></span>
                        Relacionar
                    </a>
                </div><!-- /.box-footer -->
            </form>
        </div>





    </div><!-- /.col-md-12 -->
</div> <!-- /.row -->
@endsection

@section('scripts')

    <script>
        function contains(valor, selector) {
            lista = $(selector);
            for(i = 0; i < lista.length; i++) {
                if(lista[i].value == valor) {
                    return true;
                }
            }
            return false;
        }

        function validaSelect(dados) {
            var select = $(dados.selector);

            if(select.val() == "") {

                select.parent().get(0).className = "form-group has-warning";

                return false;
            }
            return true;
        }

        $(document).ready(function(){
            var ids = "";
            $("#leftToRight").on('click',function(){
                $("#materias option:selected").each(function(i, item){
                    if(!contains(item.value, "#turmas_selecionadas option")) {
                        $('<option>', {
                            value: item.value,
                            html: item.innerHTML
                        }).appendTo('#turmas_selecionadas');
                    }

                });
            });
            jQuery("#rightToLeft").on('click', function(){
                var selecionados = $("#turmas_selecionadas option:selected");
                    for(i = 0; i < selecionados.length; i++) {
                        selecionados[i].remove();
                    }
            });
            $("#submit").on('click',function(){
                ids = "";
                $("#turmas_selecionadas option").each(function(i, c) {
                    
                    if(i === $("#turmas_selecionadas option").length -1) {
                        ids += this.value;
                    }else{
                        ids += (this.value + "|");
                    }
                });
                
                $("#idsTurmas").val(ids);
                if(validaSelect({selector: "#docente_id", mensagem: "Escolha um docente!"})) {
                    $("form").submit();
                }
            });

            $("#docente_id").on('change', function () {
                var idDocente = this.value;
                $('#turmas_selecionadas').empty();
                if(idDocente != "") {
                    $.ajax({
                    dataType: "json",
                    url: "{{url('gestor/docente-turmas/1/turmas')}}".replace("1", idDocente),
                    success: function(dados) {
                            $.each( dados.turmas, function(index, value) {
                                $('<option>', {
                                    value: value.id,
                                    html: value.nome
                                }).appendTo('#turmas_selecionadas');
                            });
                        }
                    });
                }

            });




         });



    </script>
@endsection



