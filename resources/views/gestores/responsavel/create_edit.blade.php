@extends('layouts.modalcolorbox')

@section('content')
<div class="clearfix"></div>
@if($errors->any())
  <ul class="alert alert-danger">
    @foreach($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </ul>
@endif
@if(session('success'))
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="alert alert-success"> Salvo com sucesso! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
</div>
@endif
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Cadastro <small>Aluno</small></h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <br>
      @if (isset($responsavel))
      {!! Form::model($responsavel, array('novalidate', 'url' => url('gestor/responsavel/' . $responsavel ->id ), 'method' => 'put', 'class' => 'form-horizontal form-label-left', 'files'=> true, 'id' => 'form-responsavel')) !!}
      @else
      <form class="form-horizontal form-label-left bf" action="{{url('gestor/responsavel')}}" method="post" files="true" id="form-aluno" novalidate>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      @endif
      {{ Form::hidden('id') }}
      <div class="form-group {{ $errors->has('nome') ? ' bad' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('nome', null, array('class' => 'form-control col-md-7 col-xs-12', 'placeholder'=>'Nome Completo')) !!}
          <ul class="parsley-errors-list filled">
            <li class="parsley-required">{!! $errors->first('nome') !!}</li>
          </ul>
        </div>
      </div>
      <!-- Email -->
      <div class="form-group {{ $errors->has('email') ? ' bad' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('email', null, array('class' => 'form-control col-md-7 col-xs-12', 'id' => 'email')) !!}
            <ul class="parsley-errors-list filled">
              <li class="parsley-required">{!! $errors->first('email') !!}</li>
            </ul>
        </div>
      </div>

      <!-- Data Nascimento -->
      <div class="form-group {{ $errors->has('data_nascimento') ? ' bad' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="data_nascimento">Data Nascimento<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('data_nascimento', null, array('class' => 'form-control col-md-7 col-xs-12 data', 'required')) !!}
          <ul class="parsley-errors-list filled">
            <li class="parsley-required">{!! $errors->first('data_nascimento') !!}</li>
          </ul>
        </div>
      </div>
      <!-- CPF -->
      <div class="form-group {{ $errors->has('cpf') ? ' bad' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cpf">CPF<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('cpf', null, array('class' => 'form-control col-md-7 col-xs-12 cpf')) !!}
          <ul class="parsley-errors-list filled">
            <li class="parsley-required">{!! $errors->first('cpf') !!}</li>
          </ul>
        </div>
      </div>
      <!-- RG -->
      <div class="form-group {{ $errors->has('rg') ? ' bad' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rg">RG
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('rg', null, array('class' => 'form-control col-md-7 col-xs-12')) !!}
          <ul class="parsley-errors-list filled">
            <li class="parsley-required">{!! $errors->first('rg') !!}</li>
          </ul>
        </div>
      </div>
      <!-- Sexo -->
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sexo">Sexo <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {{ Form::select('sexo', array('' => 'Selecione', 'f' => 'Feminino', 'm' => 'Masculino'), null, ['class' => 'form-control']) }}

        </div>
      </div>
      <!-- Telefone1 -->
      <div class="form-group {{ $errors->has('telefone1') ? ' bad' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefone1">Telefone 1 <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('telefone1', null, array('class' => 'form-control col-md-7 col-xs-12', 'placeholder' => '82911111111')) !!}
          <ul class="parsley-errors-list filled">
            <li class="parsley-required">{!! $errors->first('telefone1') !!}</li>
          </ul>
        </div>
      </div>
      <!-- Telefone2 -->
      <div class="form-group {{ $errors->has('telefone2') ? ' bad' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefone2">Telefone 2
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('telefone2', null, array('class' => 'form-control col-md-7 col-xs-12', 'placeholder' => '82911111111')) !!}
          <ul class="parsley-errors-list filled">
            <li class="parsley-required">{!! $errors->first('telefone2') !!}</li>
          </ul>
        </div>
      </div>

      <!-- Grupo de dados do Endereço -->
      <div class="x_title">
        <h2>Endereço</h2>
        <div class="clearfix"></div>
      </div>

      <!-- Endereço -->
      <div class="form-group {{ $errors->has('endereco') ? ' bad' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="endereco">Endereço<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('endereco', null, array('class' => 'form-control col-md-7 col-xs-12 endereco')) !!}
          <ul class="parsley-errors-list filled">
            <li class="parsley-required">{!! $errors->first('endereco') !!}</li>
          </ul>
        </div>
      </div>

      <!-- Cidade -->
      <div class="form-group {{ $errors->has('cidade') ? ' bad' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cidade">Cidade<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('cidade', null, array('class' => 'form-control col-md-7 col-xs-12 cidade')) !!}
          <ul class="parsley-errors-list filled">
            <li class="parsley-required">{!! $errors->first('cidade') !!}</li>
          </ul>
        </div>
      </div>


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
</div>
@stop
@section('scripts')

<!-- validator -->
<script>
$(function(){

  $("#form-responsavel").validate({
    onkeyup: function(element) {$(element).valid()},
    rules: {
      nome: {
        required: true,
        minlength: 3
      },
      data_nascimento : {
        date : true
      },
      cpf : {
        minlength : 11
      },
      sexo : {
        required : true
      },
      telefone1 : {
        required : true,
        minlength: 11,
        maxlength: 11
      },
      cpf : 'required'
    }
  });
});
</script>
<!-- /validator -->
@endsection
