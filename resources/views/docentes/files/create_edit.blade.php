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
	         action=" {{ url('docente/post/create') }}"
           >
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
  ;(function($){
    'use strict';
    $(document).ready(function(){
      var $fileupload = $('#fileupload');
       $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $fileupload.data('token') } });
      
      $fileupload.fileupload({
        url: '/docente/file/upload',
        dataType: 'json',
        formData: {_token: $fileupload.data('token')},
        done: function (e, data) {
            $('#progress .progress-bar').css(
                'width',
                0 + '%'
            ).attr('data-transitiongoal', 0);
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
        }
    })

    });
  })(window.jQuery);
</script>
@endsection