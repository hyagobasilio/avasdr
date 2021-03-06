@extends('layouts.gestor.template')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Cadastro <small>Curso</small></h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <br>
    @if (isset($curso))
    {!! Form::model($curso, array('url' => url('gestor/cursos/' . $curso->id ), 'method' => 'put', 'class' => 'form-horizontal form-label-left', 'files'=> true)) !!}
    @else
    {!! Form::open(array('url' => url('gestor/cursos'), 'method' => 'post', 'class' => 'form-horizontal bf', 'files'=> true)) !!}
    @endif
    {!! Form::hidden('id') !!}
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

    <!-- Carga Horária -->
    <div class="form-group {{ $errors->has('carga_horaria') ? ' bad' : '' }}">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="carga_horaria">Carga Horária<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('carga_horaria', null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Carga Horária']) !!}
        <ul class="parsley-errors-list filled" id="parsley-id-5">
          <li class="parsley-required">{!! $errors->first('carga_horaria') !!}</li>
        </ul>
      </div>
    </div>

    <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <a href="{{url('gestor/cursos')}}" class="btn btn-primary">Cancel</a>
        <button type="submit" class="btn btn-success">
          @if(!isset($curso))Cadastrar
          @else
          Atualizar
          @endif</button>
        </div>

      </form>
    </div>
  </div>
</div>
</div>

@if( isset($curso))

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Adicionar Séries</h2>
      <!-- Botão Adicionar -->
      <div class="pull-right">
        <a href="{{{ url('gestor/serie/create/'.$curso->id) }}}"
          class="btn btn-success iframe"><span class="fa fa-add-user"></span> Adicionar Séries</a>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <br>
      <table id="table" class="table table-striped table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
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
@endif
@endsection

@section('scripts')
<script type="text/javascript">
  $(function(){
    @if( isset($curso))
    oTable = $('#table').DataTable({
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
        "ajax": "/gestor/serie/data/{{ $curso->id }}",
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
    @endif
  });
</script>
@endsection
