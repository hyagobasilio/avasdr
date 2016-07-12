@extends('layouts.gestor.template')
{{-- Content --}}
@section('content')
<div class="row">
    
  
    <h3 class="box-title">Relacionamento Docente / Matéria</h3>
    
    <!-- form start -->
    <form id="form-relacionamento-at" class="form-horizontal" method="post"
                  action="{{ url('gestor/docente-materias/create') }}"
                  autocomplete="off">
        {{ csrf_field() }}
        <!-- box-body -->

        <div class="col-xs-12">
            <div class="form-group">
                <label for="docente_id">Docente</label>
                <select name="docente_id"  id="docente_id" class="form-control">
                    <option value="">Selecione</option>
                    @foreach($docentees as $docente)
                        <option value="{{ $docente->id }}"> {{ $docente->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-5">
            <div class="form-group">
                <label for="materias">Materias</label>
                <select name="materias" size="10" id="materias" multiple="" class="height form-control">
                    @foreach($materias as $materia)
                    <option value="{{ $materia->id }}" > {{ $materia->nome }} </option>
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
                <label for="materias_selecionadas">Matérias Relacionadas</label>
                <select name="materias_selecionadas" size="10" id="materias_selecionadas" multiple="" class="height form-control">
                </select>
            </div>
        </div>

        <div class="col-md-12">
            <a href="{{ url('/gestor/alunos') }}" class="btn btn-sm btn-danger close_popup">
                <span class="glyphicon glyphicon-ban-circle"></span>
                Cancelar
            </a>
            <button type="reset" class="btn btn-sm btn-default">
                <span class="glyphicon glyphicon-remove-circle"></span>
                Limpar
            </button>

            <input type="hidden" id="idsMaterias" name="idsMaterias">
            <a href="#" id="submit" class="btn btn-info pull-right">
                <span class="glyphicon glyphicon-ok-circle"></span>
                Relacionar
            </a>
        </div><!-- /.col-md-12 -->
    </form>

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
                    if(!contains(item.value, "#materias_selecionadas option")) {
                        $('<option>', {
                            value: item.value,
                            html: item.innerHTML
                        }).appendTo('#materias_selecionadas');
                    }

                });
            });
            jQuery("#rightToLeft").on('click', function(){
                var selecionados = $("#materias_selecionadas option:selected");
                    for(i = 0; i < selecionados.length; i++) {
                        selecionados[i].remove();
                    }
            });
            $("#submit").on('click',function(){
                ids = "";
                $("#materias_selecionadas option").each(function(i) {
                    if(i === $("#materias_selecionadas option").length -1) {
                        ids += this.value;
                    }else{

                        ids += (this.value + "|");
                    }
                });

                $("#idsMaterias").val(ids);
                if(validaSelect({selector: "#docente_id", mensagem: "Escolha um docente!"})) {

                    $("form").submit();
                }
            });

            $("#docente_id").on('change', function () {
                var idDocente = this.value;
                $('#materias_selecionadas').empty();
                if(idDocente != "") {
                    $.ajax({
                    dataType: "json",
                    url: "{{url('gestor/docente-materias/1/materias')}}".replace("1", idDocente),
                    success: function(dados) {
                            $.each( dados.materias, function(index, value) {
                                $('<option>', {
                                    value: value.id,
                                    html: value.nome
                                }).appendTo('#materias_selecionadas');
                            });
                        }
                    });
                }

            });




         });



    </script>
@endsection



