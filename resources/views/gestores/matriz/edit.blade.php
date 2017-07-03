@extends('layouts.gestor.template')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Cadastro <small>Matriz</small></h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <br>
    @if (isset($matriz))
    {!! Form::model($matriz, array('url' => url('gestor/matriz/' . $matriz->id ), 'method' => 'put', 'class' => 'form-horizontal form-label-left', 'files'=> true)) !!}
    @else
    {!! Form::open(array('url' => url('gestor/matriz'), 'method' => 'post', 'class' => 'form-horizontal bf', 'files'=> true)) !!}
    @endif
    <!-- Código -->
    <div class="form-group {{ $errors->has('codigo') ? ' bad' : '' }}">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="codigo">Código<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('codigo', null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Código do curso']) !!}
        <ul class="parsley-errors-list filled" id="parsley-id-5">
          <li class="parsley-required">{!! $errors->first('codigo') !!}</li>
        </ul>
      </div>
    </div>
    <!-- Nome -->
    <div class="form-group {{ $errors->has('nome') ? ' bad' : '' }}">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('nome', null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Nome do curso']) !!}
        <ul class="parsley-errors-list filled" id="parsley-id-5">
          <li class="parsley-required">{!! $errors->first('nome') !!}</li>
        </ul>
      </div>
    </div>

    <!-- Curso -->
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="curso_id">Curso<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::select('curso_id', $cursos, null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
        <ul class="parsley-errors-list filled" id="parsley-id-5">
          <li class="parsley-required">{!! $errors->first('curso_id') !!}</li>
        </ul>
      </div>
    </div>

    <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <a href="{{url('gestor/matriz')}}" class="btn btn-primary">Cancel</a>
        <button type="submit" class="btn btn-success">
          @if(!isset($matriz))Cadastrar
          @else
          Atualizar
          @endif</button>
        </div>

      </form>
    </div>
  </div>
</div>
</div>
<div class="row tile_count ">
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-clock-o"></i> Carga Horária</span>
    <div class="count green">{{ $matriz->curso->carga_horaria}}</div>
    <span class="count_bottom">Total do Curso</span>
  </div>

  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-clock-o"></i> Carga Horária</span>
    <div class="count red disponivel">{{ $matriz->curso->carga_horaria}}</div>
    <span class="count_bottom">Disponível</span>
  </div>
</div>
@if( isset($matriz))
<div class="clearfix">

</div>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Adicionar Disciplinas</h2>
      <!-- Botão Adicionar -->
      <div class="pull-right">
        <a href="{{{ url('gestor/matriz-itens/'.$matriz->id.'/create') }}}"
          class="btn btn-success iframe"><span class="fa fa-add-user"></span> Adicionar disciplina</a>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <br>
      <table id="table" class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>C.H.</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
      <div class="clearfix"></div>
      <div class="ln_solid"></div>
    </div>
  </div>
</div>
<div class="clearfix">
@endif
@endsection

@section('scripts')
<script type="text/javascript">
var cargaHorariaUtilizada = 0;
function atualizaCargaHorariaDisponivel()
{
  cargaHorariaUtilizada =0;
  $("#table tbody tr:visible td:nth-child(3)").each(function () {
        cargaHorariaUtilizada += parseInt($(this).text());
  });

  var cargaHorariaTotal = {{$matriz->curso->carga_horaria}};
  $('.disponivel').text( cargaHorariaTotal - cargaHorariaUtilizada)
}
  $(function(){
    jQuery.fn.dataTable.Api.register( 'sum()', function ( ) {
      return this.flatten().reduce( function ( a, b ) {
        if ( typeof a === 'string' ) {
          a = a.replace(/[^\d.-]/g, '') * 2;
          console.log(a)
        }
        if ( typeof b === 'string' ) {
          console.log(b)
          b = b.replace(/[^\d.-]/g, '') * 2;
        }

        return a + b;
      }, 0 );
    } );


    @if( isset($matriz))
    oTable = $('#table').DataTable({
        "initComplete": function(settings, json) {
          atualizaCargaHorariaDisponivel();
        },
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
        "ajax": "/gestor/matriz-itens/data/{{ $matriz->id }}",
        "fnDrawCallback": function (oSettings) {
            $(".iframe").colorbox({
                iframe: true,
                width: "90%",
                height: "90%",
                onClosed: function () {
                    oTable.ajax.reload();
                    oTable.sum();
                    setTimeout(atualizaCargaHorariaDisponivel, 2000);
                }
            });

        }
    });
    @endif
    $('.select2').select2();

    $("#form-matriz").validate({
      onkeyup: function(element) {$(element).valid()},
    rules: {
      // simple rule, converted to {required:true}
      codigo: 'required',
      nome: 'required',
      curso_id: 'required'

    },
    messages: {
      materia_id : {
        required : 'Selecione a disciplina!'
      },
      carga_horaria : {
        required : 'Informe a carga horária!'
      }
    }
    });
  });
</script>
@endsection
