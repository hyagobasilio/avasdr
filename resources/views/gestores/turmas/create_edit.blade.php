@extends('layouts.gestor.template')

@section('content')

<div class="page-title">
  <div class="title_left">
    <h3>Formulário</h3>
  </div>
</div>
<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Cadastro <small>Turma</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br>
        <form class="form-horizontal form-label-left" method="post"
	action="@if (isset($turma)){{ url('gestor/turmas/' . $turma->id . '/edit') }}@endif"
	autocomplete="off">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="nome" name="nome" required class="form-control col-md-7 col-xs-12" value="{{{ old('nome', isset($turma) ? $turma->nome : null) }}}">
                {{ $errors->first('name', "<label class=\"control-label\" for=\"inputError\"\> :message </label>") }}
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ano">Ano<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="number" id="ano" min="2000" name="ano" required="required" class="form-control col-md-7 col-xs-12" value="{{{ old('ano', isset($turma) ? $turma->ano : null) }}}">
                {{ $errors->first('ano', "<label class=\"control-label\" for=\"inputError\"\> :message </label>") }}
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ano">Estágio Educacional<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  {!! Form::select('estagio_educacional',$estagiosEducacionais, null, ['class' => 'form-control col-md-7 col-xs-12', 'id' => 'estagio_educacional']) !!}
                {{ $errors->first('ano', "<label class=\"control-label\" for=\"inputError\"\> :message </label>") }}
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Ativo<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="ativo" name="ativo" type="checkbox" data-on="Ativo" data-off="Desativo" checked data-toggle="toggle">
              </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a href="{{url('gestor/turmas')}}" class="btn btn-primary">Cancel</a>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </div>

        </form>
      </div>
    </div>
</div>



@stop

@section('scripts')
<script type="text/javascript">
  $(function(){
    $("#estagio_educacional").select2({});

  });
</script>
@endsection