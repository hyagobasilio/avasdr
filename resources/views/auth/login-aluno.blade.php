@extends('auth.template')
@section('title', 'Aluno')
@section('form')
@if(session('success'))
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="alert alert-success"> {{ session('success')}} <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
</div>
@endif
<div class="clearfix"></div>
 <form class="form-horizontal" role="form" method="POST" action="{{ url('aluno/login') }}">
     {{ csrf_field() }}
    <h1>Aluno</h1>
    <div>
      <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required="" />
    </div>
    <div>
      <input type="password" name="password" class="form-control" placeholder="Senha" required="" />
    </div>
    <div>
      <button class="btn btn-default submit" >Entrar</button>
      <a class="reset_pass" href="#">Esqueceu sua senha?</a>
    </div>

    <div class="clearfix"></div>

    <div class="separator">
        <p class="change_link">Novo por aqui?
            <a href="#signup" class="to_register"> Crie sua conta! </a>
        </p>
      
      <div class="clearfix"></div>
      <br />

      <div>
        <h1><i class="fa fa-paw"></i> AVA SDR!</h1>
        <p>©2016 Todos os direitos reservados. AVA SDR!</p>
      </div>
    </div>
</form>
@endsection