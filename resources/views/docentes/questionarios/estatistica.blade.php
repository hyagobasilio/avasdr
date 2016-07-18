@extends('layouts.docente.template')
@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    @if (session('sucesso'))
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        {{ session('sucesso') }}
    </div>
    @endif
</div>
    <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>{{ $questionario->descricao }}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Aluno</th>
                          <th>Qtd. Acertos</th>
                          <th>% Acertos</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($alunos as $aluno)
                        <tr>
                          <th scope="row">{{ $aluno->id }}</th>
                          <td>{{ $aluno->name }}</td>
                          <td>{{ $aluno->acertos }}</td>
                          <td>
                          <?php  
                          $porcentagem =100 / $questionario->qtd_questoes * $aluno->acertos;
                          ?>
                           {{(int)$porcentagem}}% 
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" data-transitiongoal="{{ $porcentagem }}" aria-valuenow="{{ $porcentagem }}" style="width: 0%;"></div>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    
                      Média da turma: {{ $mediaDaTurma}}
                   

                  </div>
                </div>
              </div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
       $('.btn-add-question').on('click', function(){
         var idQuestao = $(this).data('questao');
         /*$.get('{{ url("docente/questaotemp/create/")}}/'+idQuestao,{}, function(data) {
             console.log(data);
         }); */
         $.ajax({
            type: 'post',
            url: '{{ url("docente/questaotemp/create/")}}',
            data: { id : idQuestao }
        }).success(function (data) {
            alert(data.message);
        }).fail(function (jqXHR, textStatus, errorThrown) {
            // Optionally alert the user of an error here...
            if (jqXHR.status == 403 ) {
                alert('Não autorizado');
                

            }
            var textResponse = jqXHR.responseText;
           console.log(textResponse);
        });
       });
    });
</script>
@endsection