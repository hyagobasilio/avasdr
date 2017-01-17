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
      {!! Form::model($aluno, array('url' => url('gestor/alunos/' . $aluno->id . '/edit'), 'method' => 'put', 'class' => 'form-horizontal form-label-left', 'files'=> true, 'id' => 'form-aluno')) !!}
      @else
      {!! Form::open(array('url' => url('gestor/alunos'), 'method' => 'post', 'class' => 'form-horizontal form-label-left bf', 'files'=> true, 'id' => 'form-aluno')) !!}
      @endif

      <div class="form-group {{ $errors->has('name') ? ' bad' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nome<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('name', null, array('class' => 'form-control col-md-7 col-xs-12', 'required')) !!}
          <ul class="parsley-errors-list filled" id="parsley-id-5">
            <li class="parsley-required">{!! $errors->first('name') !!}</li>
          </ul>
        </div>
      </div>
      <!-- Data Nascimento -->
      <div class="form-group {{ $errors->has('data_nascimento') ? ' bad' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="data_nascimento">Data Nascimento<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('data_nascimento', null, array('class' => 'form-control col-md-7 col-xs-12', 'required')) !!}
          <ul class="parsley-errors-list filled" id="parsley-id-5">
            <li class="parsley-required">{!! $errors->first('data_nascimento') !!}</li>
          </ul>
        </div>
      </div>
      <!-- Email -->
      <div class="form-group {{ $errors->has('email') ? ' bad' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('email', null, array('class' => 'form-control col-md-7 col-xs-12', 'type' => 'email')) !!}
            <ul class="parsley-errors-list filled" id="parsley-id-5">
              <li class="parsley-required">{!! $errors->first('email') !!}</li>
            </ul>
        </div>
      </div>
      <!-- CPF -->
      <div class="form-group {{ $errors->has('cpf') ? ' bad' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cpf">CPF<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('cpf', null, array('class' => 'form-control col-md-7 col-xs-12')) !!}
          <ul class="parsley-errors-list filled" id="parsley-id-5">
            <li class="parsley-required">{!! $errors->first('cpf') !!}</li>
          </ul>
        </div>
      </div>
      <!-- Senha -->
      <div class="form-group {{ $errors->has('password') ? ' bad' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Senha<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="password" id="password" name="password" class="form-control col-md-7 col-xs-12" value="{{{ old('password') }}}">
          <ul class="parsley-errors-list filled" id="parsley-id-5">
              <li class="parsley-required">{!! $errors->first('password') !!}</li>
          </ul>
        </div>
      </div>

      <div class="form-group {{ $errors->has('password_confirmation') ? ' bad' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password_confirmation">Confirmar Senha<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control col-md-7 col-xs-12" value="{{{ old('password_confirmation')}}}">
          <ul class="parsley-errors-list filled" id="parsley-id-5">
            <li class="parsley-required">{!! $errors->first('password_confirmation') !!}</li>
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
<!-- <script type="text/javascript" src="/tema/vendors/jquery-validation/dist/jquery.validate.min.js"></script> -->
<!-- validator -->
<script src="/tema/vendors/validator/validator.js"></script>
<script type="text/javascript">
$(function(){


  // initialize the validator function
  validator.message.date = 'not a real date';

  // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
  $('form')
    .on('blur', 'input[required], input.optional, select.required', validator.checkField)
    .on('change', 'select.required', validator.checkField)
    .on('keypress', 'input[required][pattern]', validator.keypress);

  $('.multi.required').on('keyup blur', 'input', function() {
    validator.checkField.apply($(this).siblings().last()[0]);
  });
  $('form').submit(function(e) {
    e.preventDefault();
    var submit = true;

    // evaluate the form using generic validaing
    if (!validator.checkAll($(this))) {
      submit = false;
    }

    if (submit)
      this.submit();

    return false;
  });
});
  /*$(function(){
    var regras = {
        name: {
          required: true,
          minlength: 3
        },
        email: {
          required:true,
          email:true
        },
        cpf: {
          required:true,
          minlength: 11,
          maxlength: 11
        },
        password: {
          required: true,
          minlength: 5
        },
        password_confirmation : {
          required: true,
          minlength: 5,
          equalTo: "#password"
        },
      };
      if($())
    $('#form-aluno').validate({
      rules: regras,
      messages : {
        name: {
          required: 'Preencha o campo nome!',
          minlength: 'O nome deve ter no mínimo 3 letras'
        },
        email: {
          required: 'Preencha o campo email!',
          email: 'Email inválido!'
        },
        cpf: {
          required: 'Preencha o campo cpf',
          minlength: 'O cpf deve conter 11 numeros',
          maxlength: 'O cpf deve conter 11 numeros',
        },
        password: {
          required: 'Preenca o campo senha!',
          minlength: 'A senha deve ter no mínimo 5 caracteres'
        },
        password_confirmation : {
          required: 'Digite novamente aqui a senha!',
          minlength: 'A senha deve ter no mínimo 5 caracteres',
          equalTo: "#password"
        },
      }
    });
  })*/
</script>
@endsection
