@extends('layouts.modalcolorbox')

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
      <h2>Cadastro <small>Série</small></h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <br>
    @if (isset($serie))
    {!! Form::model($serie, array('url' => url('gestor/serie/' . $serie->id ), 'method' => 'put', 'class' => 'form-horizontal form-label-left', 'files'=> true)) !!}
    @else
    {!! Form::open(array('url' => url('gestor/serie'), 'method' => 'post', 'class' => 'form-horizontal bf', 'files'=> true)) !!}
    @endif
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('nome', null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Nome da Série']) !!}
        {{ $errors->first('nome', "<label class=\"control-label\" for=\"inputError\"\> :message </label>") }}
      </div>
    </div>

    <input type="hidden" name="curso_id" value="{{ $curso->id }}">

    <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <a href="{{url('gestor/cursos')}}" class="btn btn-primary">Cancel</a>
        <button type="submit" class="btn btn-success">
          @if(!isset($serie))Cadastrar
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

  });
</script>
@endsection
