@extends('layouts.modalcolorbox')

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
    {!! Form::model($matriz, array('url' => url('gestor/matriz/' . $matriz->id ), 'method' => 'put', 'class' => 'form-horizontal form-label-left', 'files'=> true, 'id' => 'form-matriz')) !!}
    @else
    {!! Form::open(array('url' => url('gestor/matriz'), 'method' => 'post', 'class' => 'form-horizontal bf', 'files'=> true, 'id' => 'form-matriz')) !!}
    @endif
    <!-- Código -->
    <div class="form-group {{ $errors->has('codigo') ? ' bad' : '' }}">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="codigo">Código<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('codigo', null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Código da matriz']) !!}
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
        {!! Form::text('nome', null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Nome da matriz']) !!}
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
        {!! Form::select('curso_id', $cursos, null, ['class' => 'form-control col-md-7 col-xs-12 select2']) !!}
        {{ $errors->first('curso_id', "<label class=\"control-label\" for=\"inputError\"\> :message </label>") }}
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
@section('scripts')
<script type="text/javascript">
  $(function(){
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
