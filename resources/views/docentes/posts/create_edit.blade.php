@extends('layouts.docente.template')

@section('content')

<div class="page-title">
  <div class="title_left">
    <h3>Formulário</h3>
  </div>
</div>

<div class="row">
  @if(session('success'))
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="alert alert-success"> Salvo com sucesso! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
  </div>
  @endif
</div>
<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
    
  <div class="x_panel">
    
    <div class="x_content">
      <div class="clearfix"></div>
      <form class="form-horizontal form-label-left" method="post"
	action="@if (isset($post)){{ url('docente/post/' . $post->id . '/edit') }}@else {{ url('docente/post') }}@endif"
	>
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <br>
        <!-- Matéria-->
        <div class="row">
          <!-- curso-->
          <div class="col-md-3 col-sm-12 col-xs-12 form-group {{ $errors->has('materia_id') ? 'bad' : '' }}">
            <label for="materia_id">Matéria</label>
            {!! Form::select('materia_id', $dados['materias'], null, ['class' => 'form-control']) !!}
            <ul class="parsley-errors-list filled" id="parsley-id-5">
              <li class="parsley-required">{!! $errors->first('materia_id') !!}</li>
            </ul>
          </div>
        
          <!-- curso-->
          <div class="col-md-3 col-sm-12 col-xs-12 form-group {{ $errors->has('turma_id') ? 'bad' : '' }}">
            <label for="turma_id">Turma</label>
            {!! Form::select('turma_id', $dados['turmas'], null, ['class' => 'form-control']) !!}
            <ul class="parsley-errors-list filled" id="parsley-id-5">
              <li class="parsley-required">{!! $errors->first('turma_id') !!}</li>
            </ul>
          </div>
        </div>

        <!-- Titulo-->
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12 form-group {{ $errors->has('titulo') ? 'bad' : '' }}">
            <label for="titulo" class="">Titulo</label>
            <input type="text" name="titulo" value="{{ old('titulo')}}" class="form-control">
            <ul class="parsley-errors-list filled" id="parsley-id-5">
              <li class="parsley-required">{!! $errors->first('titulo') !!}</li>
            </ul>
          </div>
        </div>

        <div class="row">
          <!-- Resposta -->
          <div class="col-md-12 col-sm-12 col-xs-12 form-group {{ $errors->has('texto') ? 'bad' : '' }}">
            <label for="texto">Texto</label>
            <textarea id="editor" name="texto" rows="5" class="editor form-control">{{ old('texto')}}</textarea>
            <ul class="parsley-errors-list filled" id="parsley-id-5">
              <li class="parsley-required">{!! $errors->first('texto') !!}</li>
            </ul>
          </div>
        </div>
        <div id="anexos-inputs">
          
        </div>

        <div class="row">


          

            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <br>
            <!-- Matéria-->
            <span class="btn btn-success fileinput-button">
              <i class="glyphicon glyphicon-plus"></i>
              <span>Selecionar arquivos...</span>
              <input id="fileupload" name="documento" type="file" name="files" data-token="{!! csrf_token() !!}">
            </span>

            <br>
            <div id="progress" class="progress">
              <div class="progress-bar progress-bar-success" data-transitiongoal="0" aria-valuenow="0"></div>
            </div>     

          <div class="attachment">
            <ul id="anexos">
            </ul>
          </div>
        </div>
           
                
      </div><!-- ./Formulário;-->
      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <a href="{{url('gestor/alunos')}}" class="btn btn-primary">Cancel</a>
          <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
      </div>

    </form>
  </div>
</div>
<div class="clearfix"></div>

@stop
@section('script')
<script type="text/javascript">
  function removerAnexo(id) {
    $.post('/docente/file/' + id + '/delete', function(data) {
      console.log(data.result);
    });
    $.ajax({
      url: '/docente/file/' + id + '/delete',
      method: 'GET'
    }).done(function(data) {
      console.log(data.result);
      $('#anexo-'+id).remove();
    }).fail(function(data, e, erro){
      console.log(data.responseText);
    });
  }
  ;(function($){
    'use strict';
    $(document).ready(function(){
      var $fileupload = $('#fileupload');
       $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $fileupload.data('token') } });
      
      $fileupload.fileupload({
        url: '/docente/post/upload',
        dataType: 'json',
        formData: {_token: $fileupload.data('token')},
        done: function (e, data) {
            $('#progress .progress-bar').css(
                'width',
                0 + '%'
            ).attr('data-transitiongoal', 0);
            console.log(data.result)

             var li = '<li id="anexo-'+data.result.id+'">' +
                '<a href="javascript:void(0)" class="atch-thumb">' +
                  '<img src="/documentos/'+data.result.docente_id+'/' +data.result.name+'" alt="img">' +
                '</a>'+
                '<div class="file-name">' +
                  data.result.original_name +
                '</div>' +
                '<div class="links">' +
                  '<a href="javascript:removerAnexo('+data.result.id+')"> Excluir </a>' +
                '</div>' + 
              '</li>';
              var inpt = '<input type="hidden" name="anexos[]" value="'+data.result.id+'">';
              $('#anexos-inputs').append(inpt);
              $('#anexos').append(li);
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
          
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            ).attr('data-transitiongoal', progress);
        },
        fail : function(e, data) {
          setTimeout(function() {
            $('#progress .progress-bar').css(
                  'width',
                  0 + '%'
              ).attr('data-transitiongoal', 0);
          }, 1500);
          console.log('error')
          console.log(e, data)
        }
    })

    });
  })(window.jQuery);
</script>
@endsection