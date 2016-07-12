@extends('layouts.gestor.template')

@section('content')

<div class="page-title">
  <div class="title_left">
    <h3>Formulário</h3>
  </div>
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
        {!! Form::model($aluno, array('url' => url('gestor/alunos/' . $aluno->id . '/edit'), 'method' => 'put', 'class' => 'form-horizontal form-label-left', 'files'=> true)) !!}
        @else
        {!! Form::open(array('url' => url('gestor/alunos'), 'method' => 'post', 'class' => 'form-horizontal bf', 'files'=> true)) !!}
        @endif

            <div class="form-group {{ $errors->has('name') ? ' bad' : '' }}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nome<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('name', null, array('class' => 'form-control col-md-7 col-xs-12')) !!}
                    
                    <ul class="parsley-errors-list filled" id="parsley-id-5">
                        <li class="parsley-required">{!! $errors->first('name') !!}</li>
                    </ul>
                    
              </div>
            </div>

            <div class="form-group {{ $errors->has('email') ? ' bad' : '' }}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  {!! Form::text('email', null, array('class' => 'form-control col-md-7 col-xs-12')) !!}
                    <ul class="parsley-errors-list filled" id="parsley-id-5">
                        <li class="parsley-required">{!! $errors->first('email') !!}</li>
                    </ul>
              </div>
            </div>

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
