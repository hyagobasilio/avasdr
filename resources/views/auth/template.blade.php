<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | @yield('title') </title>

    <!-- Bootstrap -->
    <link href="{{ asset('tema/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('tema/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('tema/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('tema/build/css/custom.min.css')}}" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            @yield('form')
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ url('/aluno/create') }}">
                {{ csrf_field() }}
                
              <h1>Cadastrar Aluno</h1>
              <div class="">
                  <input id="name" class="form-control" value="{{old('name')}}" name="name" placeholder="Nome Completo"  type="text">
              </div>
              <div>
                  <input type="text" name="cpf" value="{{old('cpf')}}" class="form-control" placeholder="CPF"  />
              </div>
              <div>
                  <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" />
              </div>
              <div>
                  <input type="password" name="password" class="form-control" placeholder="Senha"  />
              </div>
              
              <div>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Senha" />
              </div>
              
              <div>
                <button class="btn btn-default submit">Cadastrar</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Já tem cadastro?
                  <a href="#signin" class="to_register"> Faça Login! </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> AVASDR!</h1>
                  <p>©2016 Todos direitos reservados. Hyago Henrique!</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <!-- jQuery  -->
    <script src="{{ asset('tema/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('tema/vendors/validator/validator.js') }}"></script>
    <!-- validator -->
    
    <!-- /validator -->

  </body>
</html>