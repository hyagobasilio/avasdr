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
      <h2>Cadastro <small>Curso</small></h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <br>
    @if (isset($curso))
    {!! Form::model($curso, array('url' => url('gestor/cursos/' . $curso->id . '/edit'), 'method' => 'put', 'class' => 'form-horizontal form-label-left', 'files'=> true)) !!}
    @else
    {!! Form::open(array('url' => url('gestor/cursos'), 'method' => 'post', 'class' => 'form-horizontal bf', 'files'=> true)) !!}
    @endif
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('nome', old('nome'), ['class' => 'form-control col-md-7 col-xs-12']) !!}
        {{ $errors->first('name', "<label class=\"control-label\" for=\"inputError\"\> :message </label>") }}
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ano">Estágio Educacional<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::select('estagio_educacional',$estagiosEducacionais, null, ['class' => 'form-control', 'id' => 'estagio_educacional']) !!}
        {{ $errors->first('ano', "<label class=\"control-label\" for=\"inputError\"\> :message </label>") }}
      </div>
    </div>

    <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <a href="{{url('gestor/materias')}}" class="btn btn-primary">Cancel</a>
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
@endsection

@section('scripts')
<script type="text/javascript">
  $(function(){
    $("#estagio_educacional").select2();

  });
</script>
@endsection
