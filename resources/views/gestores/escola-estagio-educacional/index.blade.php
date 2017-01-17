@extends('layouts.gestor.template')
{{-- Content --}}
@section('content')
<br>
<div class="row">
  <div class="col-md-12">
    <div class="x_panel ">
      <div class="x_title">
        <h2>Relacionamento Estágios Educacionais / Escola </h2>
        <div class="clearfix"></div>
      </div><!-- /.box-header -->
      <!-- form start -->
      <form id="form-relacionamento-at" class="form-horizontal" method="post"
      action="{{ url('gestor/escola-estagio-educacional') }}"
      autocomplete="off">
      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
      <!-- box-body -->
      <div class="x_content">
        <div class="col-xs-12">
          <div class="form-group">
            <label for="escola_id">Escola</label>
            <select name="escola_id"  id="escola_id" class="form-control">
              <option value="">Selecione</option>
              @foreach($escolas as $escola)
              <option value="{{ $escola->id }}"> {{ $escola->nome }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-xs-5">
          <div class="form-group">
            <label for="baseEstagios">Estágios Educacionais</label>
            <select name="baseEstagios" size="10" id="baseEstagios" multiple="" class="height form-control">
              @foreach($estagiosEducacionais as $estagio)
              <option value="{{ $estagio->id }}" > {{ $estagio->nome }} </option>
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
            <label for="estagios">Estagios selecionadas</label>
            <select name="estagios" size="10" id="estagios" multiple="" class="height form-control">
            </select>
          </div>
        </div>



      </div><!-- /.box-body -->
      <div class="">
        <a href="{{ url('/gestor') }}" class="btn btn-sm btn-danger close_popup">
          <span class="glyphicon glyphicon-ban-circle"></span>
          Cancelar
        </a>
        <button type="reset" class="btn btn-sm btn-default">
          <span class="glyphicon glyphicon-remove-circle"></span>
          Limpar
        </button>

        <input type="hidden" id="estagio_ids" name="estagio_ids">
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
    $("#baseEstagios option:selected").each(function(i, item){
      if(!contains(item.value, "#estagios option")) {
        $('<option>', {
          value: item.value,
          html: item.innerHTML
        }).appendTo('#estagios');
      }

    });
  });
  jQuery("#rightToLeft").on('click', function(){
    var selecionados = $("#estagios option:selected");
    for(i = 0; i < selecionados.length; i++) {
      selecionados[i].remove();
    }
  });
  $("#submit").on('click',function(){
    ids = "";
    $("#estagios option").each(function(i) {
      if(i === $("#estagios option").length -1) {
        ids += this.value;
      }else{

        ids += (this.value + "|");
      }
    });

    $("#estagio_ids").val(ids);
    $("form").submit();
  });

  $("#escola_id").on('change', function () {
    var idEscola = this.value;
    $('#estagios').empty();
    if(idEscola != "") {
      $.ajax({
        dataType: "json",
        url: "{{url('gestor/escola-estagio-educacional/1/estagios')}}".replace("1", idEscola),
        success: function(dados) {
          $.each( dados.estagios, function(index, value) {
            $('<option>', {
              value: value.id,
              html: value.nome
            }).appendTo('#estagios');
          });
        }
      });
    }

  });

});

</script>
@endsection
