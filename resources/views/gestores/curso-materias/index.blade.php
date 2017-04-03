@extends('layouts.gestor.template')
{{-- Content --}}
@section('content')
<br>
<div class="row">
  <div class="col-md-12">

    <div class="x_panel ">
      <div class="x_title">
        <h2>Relacionamento Curso / Materias </h2>
        <div class="clearfix"></div>
      </div><!-- /.box-header -->
      <!-- form start -->
      <form id="form-relacionamento-at" class="form-horizontal" method="post"
      action="{{ url('gestor/curso-materias') }}"
      autocomplete="off">
      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
      <!-- box-body -->
      <div class="x_content">
        <div class="col-xs-12">
          <div class="form-group">
            <label for="curso_id">Curso</label>
            <select name="curso_id"  id="curso_id" class="form-control">
              <option value="">Selecione</option>
              @foreach($cursos as $curso)
              <option value="{{ $curso->id }}"> {{ $curso->nome }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-xs-5">
          <div class="form-group">
            <label for="basematerias">Matérias</label>
            <select name="basematerias" size="10" id="basematerias" multiple="" class="height form-control">
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
            <label for="materias">Materias selecionadas</label>
            <select name="materias" size="10" id="materias" multiple="" class="height form-control">
            </select>
          </div>
        </div>



      </div><!-- /.box-body -->
      <div class="">
        <a href="{{ url('/admin/curso-materias') }}" class="btn btn-sm btn-danger close_popup">
          <span class="glyphicon glyphicon-ban-circle"></span>
          Cancelar
        </a>
        <button type="reset" class="btn btn-sm btn-default">
          <span class="glyphicon glyphicon-remove-circle"></span>
          Limpar
        </button>

        <input type="hidden" id="materia_id" name="materia_id">
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

$(document).ready(function(){
  var ids = "";
  $("#leftToRight").on('click',function(){
    $("#basematerias option:selected").each(function(i, item){
      if(!contains(item.value, "#materias option")) {
        $('<option>', {
          value: item.value,
          html: item.innerHTML
        }).appendTo('#materias');
      }

    });
  });
  jQuery("#rightToLeft").on('click', function(){
    var selecionados = $("#materias option:selected");
    for(i = 0; i < selecionados.length; i++) {
      selecionados[i].remove();
    }
  });
  $("#submit").on('click',function(){
    ids = "";
    $("#materias option").each(function(i) {
      if(i === $("#materias option").length -1) {
        ids += this.value;
      }else{

        ids += (this.value + "|");
      }
    });

    $("#materia_id").val(ids);
    $("form").submit();
  });

  $("#curso_id").on('change', function () {
    var idCurso = this.value;
    $('#materias').empty();
    if(idCurso != "") {
      $.ajax({
        dataType: "json",
        url: "{{url('gestor/curso-materias/1/materias')}}".replace("1", idCurso),
        success: function(dados) {
          $.each( dados.materias, function(index, value) {
            $('<option>', {
              value: value.id,
              html: value.nome
            }).appendTo('#materias');
          });
        }
      });
    }

  });

});
</script>
@endsection
