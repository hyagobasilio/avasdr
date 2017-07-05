@extends('layouts.gestor.template')

@section('head')
<link rel="stylesheet" href="/tema/vendors/clockpicker/src/clockpicker.css">
<link rel="stylesheet" href="/tema/vendors/clockpicker/src/standalone.css">
@endsection
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Cadastro turma</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br>
        @if (isset($turma))
          {!! Form::model($turma, array('url' => url('gestor/turmas/' . $turma->id ), 'method' => 'put', 'class' => 'form-horizontal form-label-left', 'files'=> true)) !!}
        @else
          {!! Form::open(array('url' => url('gestor/turmas'), 'method' => 'post', 'class' => 'form-horizontal bf', 'files'=> true)) !!}
        @endif
            
            <!-- Nome -->
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  {!! Form::text('nome', null, ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Ex.: 6º B']) !!}
                {!! $errors->first('nome', "<label class=\"control-label\" for=\"inputError\"\> :message </label>") !!}
              </div>
            </div>

            <!-- Curso -->
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="curso_id">Curso<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::select('curso_id',$cursos, null, ['class' => 'form-control', 'id' => 'curso_id']) !!}
                {!! $errors->first('curso_id', "<label class=\"control-label\" for=\"inputError\"\> :message </label>") !!}
              </div>
            </div>
            <!-- Série -->
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="serie_id">Série<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::select('serie_id',[], null, ['class' => 'form-control', 'id' => 'serie_id']) !!}
                {!! $errors->first('serie_id', "<label class=\"control-label\" for=\"inputError\"\> :message </label>") !!}
              </div>
            </div>
            <!-- Matriz -->
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="serie_id">Matriz<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::select('matriz_id',[], null, ['class' => 'form-control', 'id' => 'matriz_id']) !!}
                {!! $errors->first('matriz_id', "<label class=\"control-label\" for=\"inputError\"\> :message </label>") !!}
              </div>
            </div>
            
            <!-- Turnos -->
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="turno_id">Turno<span class="required">*</span>
              </label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                {!! Form::select('turno_id',$turnos, null, ['class' => 'form-control', 'id' => 'turno_id']) !!}
                {!! $errors->first('turno_id', "<label class=\"control-label\" for=\"inputError\"\> :message </label>") !!}
              </div>
            </div>

            <!-- Hora Início -->
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hora_inicio">Hora início<span class="required">*</span>
              </label>
              <div class="col-md-2 col-sm-2 col-xs-12">

                <div class="input-group clockpicker">
                  {!! Form::text('hora_inicio', null, ['class' => 'hora form-control', 'placeholder' => '00:00' ]) !!}
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-time"></span>
                  </span>
                </div>
                  
                {!! $errors->first('hora_inicio', "<label class=\"control-label\" for=\"inputError\"\> :message </label>") !!}
              </div>
            </div>

            <!-- Hora Final -->
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hora_fim">Hora final<span class="required">*</span>
              </label>
              <div class="col-md-2 col-sm-2 col-xs-12">
                
                <div class="input-group clockpicker">
                  {!! Form::text('hora_fim', null, ['class' => 'hora form-control', 'placeholder' => '00:00']) !!}
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-time"></span>
                  </span>
                </div>
                {!! $errors->first('hora_fim', "<label class=\"control-label\" for=\"inputError\"\> :message </label>") !!}
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
<script src="/tema/vendors/clockpicker/src/clockpicker.js"></script>
<script type="text/javascript">
  $(function(){
    $('.clockpicker').clockpicker({
        placement: 'top',
        align: 'left',
        donetext: 'Feito',
        autoclose: true
    });

    $("#curso_id").on('change', function () {
      var idCurso = this.value;
      $('#serie_id').empty();
      $('#matriz_id').empty();
      if(idCurso != "") {
        $.ajax({
          dataType: "json",
          url: "/gestor/turmas/series/curso/?".replace("?", idCurso),
          success: function(dados) {
            $.each( dados, function(index, value) {
              $('<option>', {
                value: value.id,
                html: value.nome
              }).appendTo('#serie_id');
            });
          }
        });

        $.ajax({
          dataType: "json",
          url: "/gestor/turmas/matrizes/curso/?".replace("?", idCurso),
          success: function(dados) {
            $.each( dados, function(index, value) {
              $('<option>', {
                value: value.id,
                html: value.nome
              }).appendTo('#matriz_id');
            });
          }
        });
      }

    });

  });
</script>
@endsection
