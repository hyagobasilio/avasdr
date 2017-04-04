@extends('layouts.gestor.template')

@section('content')

<div class="page-title">
  <!-- <div class="title_left">
    <h3>Formulário</h3>
  </div> -->
</div>
<div class="clearfix"></div>
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
      @if (isset($aluno))
      {!! Form::model($aluno, array('novalidate', 'url' => url('gestor/alunos/' . $aluno->id . '/edit'), 'method' => 'put', 'class' => 'form-horizontal form-label-left', 'files'=> true, 'id' => 'form-aluno')) !!}
      @else
      <form class="form-horizontal form-label-left bf" action="{{url('gestor/alunos')}}" method="post" files="true" id="form-aluno" novalidate>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      @endif
      {{ Form::hidden('id', null,['id' => 'id']) }}
      <div class="form-group {{ $errors->has('name') ? ' bad' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nome<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('name', null, array('class' => 'form-control col-md-7 col-xs-12', 'placeholder'=>'Nome Completo')) !!}
          <ul class="parsley-errors-list filled" id="parsley-id-5">
            <li class="parsley-required">{!! $errors->first('name') !!}</li>
          </ul>
        </div>
      </div>
      <!-- Email -->
      <div class="form-group {{ $errors->has('email') ? ' bad' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('email', null, array('class' => 'form-control col-md-7 col-xs-12', 'id' => 'email')) !!}
            <ul class="parsley-errors-list filled" id="parsley-id-5">
              <li class="parsley-required">{!! $errors->first('email') !!}</li>
            </ul>
        </div>
      </div>
      <!-- Senha -->
      <div class="form-group {{ $errors->has('password') ? ' bad' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Senha<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::password('password', array('class' => 'form-control col-md-7 col-xs-12', 'type' => 'password', 'id' => 'password')) !!}
          <ul class="parsley-errors-list filled" id="parsley-id-5">
              <li class="parsley-required">{!! $errors->first('password') !!}</li>
          </ul>
        </div>
      </div>
      <!-- Confirmar Senha -->
      <div class="form-group {{ $errors->has('password_confirmation') ? ' bad' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password_confirmation">Confirmar Senha<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::password('password_confirmation', array('class' => 'form-control col-md-7 col-xs-12')) !!}
          <ul class="parsley-errors-list filled" id="parsley-id-5">
            <li class="parsley-required">{!! $errors->first('password_confirmation') !!}</li>
          </ul>
        </div>
      </div>
      <!-- Data Nascimento -->
      <div class="form-group {{ $errors->has('data_nascimento') ? ' bad' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="data_nascimento">Data Nascimento<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('data_nascimento', null, array('class' => 'form-control col-md-7 col-xs-12 data', 'required')) !!}
          <ul class="parsley-errors-list filled" id="parsley-id-5">
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
          <ul class="parsley-errors-list filled" id="parsley-id-5">
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
          <ul class="parsley-errors-list filled" id="parsley-id-5">
            <li class="parsley-required">{!! $errors->first('rg') !!}</li>
          </ul>
        </div>
      </div>
      <!-- Mãe -->
      <div class="form-group {{ $errors->has('mae_id') ? ' bad' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mae">Mãe<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="input-group">
            <?php $mae = isset($aluno->mae) ? $aluno->mae->nome : null; ?>
            {!! Form::text('mae', $mae, array('class' => 'form-control col-md-7 col-xs-12', 'autocomplete' => 'off', 'id' => 'mae')) !!}
            <input type="hidden" name="mae_id" id="mae_id" value="@if(isset($aluno)) {{ $aluno->mae_id }} @endif">
            <span class="input-group-btn">
              <a href="/gestor/responsavel/create" class="btn btn-primary iframe"><i  class="glyphicon glyphicon-plus"></i></a>
            </span>
          </div>
          <ul class="parsley-errors-list filled" id="parsley-id-5">
            <li class="parsley-required">{!! $errors->first('mae') !!}</li>
          </ul>
        </div>
      </div>
      <!-- Pai -->
      <div class="form-group {{ $errors->has('mae') ? ' bad' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pai_id">Pai
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="input-group">
            <?php $pai = isset($aluno->pai) ? $aluno->pai->nome : null; ?>
            {!! Form::text('pai', $pai, array('class' => 'form-control col-md-7 col-xs-12', 'autocomplete' => 'off', 'id' => 'pai')) !!}
            <input type="hidden" name="pai_id" id="pai_id" value="@if(isset($aluno)) {{ $aluno->pai_id }} @endif">
            <span class="input-group-btn">
              <a href="/gestor/responsavel/create" class="btn btn-primary iframe"><i  class="glyphicon glyphicon-plus"></i></a>
            </span>
          </div>
          <ul class="parsley-errors-list filled" id="parsley-id-5">
            <li class="parsley-required">{!! $errors->first('pai') !!}</li>
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
          <ul class="parsley-errors-list filled" id="parsley-id-5">
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
          <ul class="parsley-errors-list filled" id="parsley-id-5">
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



  $("#form-aluno").validate({
    onkeyup: function(element) {$(element).valid()},
  rules: {
    // simple rule, converted to {required:true}
    name: {
      required: true,
      minlength: 3
    },
    data_nascimento : {
      date : true
  },
    email: {
      required: true,
      email: true,
      remote : {
        url : '/gestor/alunos/iscadastrado',
        data : {
          email: function(){ return  $('#email').val()},
          id: function(){ return $('#id').val()}
        }
      }
    },
    password : {
      minlength : 6
    },
    password_confirmation : {
      minlength: 6,
      equalTo: "#password"
    },
    cpf : {
      minlength : 11
    },
    mae : 'required'
  },
  messages: {
    email : {
      remote : 'Email já cadastrado!'
    }
  }
  });
});
</script>
<!-- /validator -->
@endsection
