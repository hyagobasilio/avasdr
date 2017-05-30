@extends('layouts.modalcolorbox')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Cadastro <small>Série</small></h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <br>
    @if (isset($matrizItem))
    {!! Form::model($matrizItem, array('url' => url('gestor/serie/' . $matrizItem->id ), 'method' => 'put', 'class' => 'form-horizontal form-label-left', 'files'=> true)) !!}
    @else
    {!! Form::open(array('url' => url('gestor/matriz-itens'), 'method' => 'post', 'class' => 'form-horizontal bf', 'files'=> true)) !!}
    @endif
    {!! Form::hidden('id') !!}
    <!-- Disciplina -->
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="materia_id">Disciplina<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::select('materia_id', $disciplinas, null,['class' => 'form-control col-md-7 col-xs-12 select2']) !!}
        <ul class="parsley-errors-list filled" id="parsley-id-5">
          <li class="parsley-required">{!! $errors->first('materia_id') !!}</li>
        </ul>
      </div>
    </div>
    <!-- Carga Horária -->
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="carga_horaria">Carga Horária<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('carga_horaria', null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Carga Horária']) !!}
        <ul class="parsley-errors-list filled" id="parsley-id-5">
          <li class="parsley-required">{!! $errors->first('carga_horaria') !!}</li>
        </ul>
      </div>
    </div>
    </div>

    <input type="hidden" name="matriz_id" value="{{ $matriz->id }}">

    <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <a href="{{url('gestor/cursos')}}" class="btn btn-primary">Cancel</a>
        <button type="submit" class="btn btn-success">
          @if(!isset($matrizItem))Cadastrar
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
    $('.select2').select2();

    $("#form-aluno").validate({
      onkeyup: function(element) {$(element).valid()},
    rules: {
      // simple rule, converted to {required:true}
      materia_id: 'required',
      carga_horaria: 'required'

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
