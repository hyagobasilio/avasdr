@extends('auth.template')
@section('form')
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
      
      <div class="clearfix"></div>
      <br />

      <div>
        <h1><i class="fa fa-paw"></i> AVA SDR!</h1>
        <p>©2016 Todos os direitos reservados. AVA SDR!</p>
      </div>
    </div>
</form>
@endsection