@extends('layouts.aluno.template')
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
                    <h2>Questionários <small> todos</small></h2>
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
                          <th>Descrição</th>
                          <th>Vigência</th>
                          <th>Qtd. Questões</th>
                          <th>Qtd. Acertos</th>
                          <th>% Acertos</th>
                          <th>Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($questionarios as $questionario)
                        <tr>
                          <th scope="row">{{ $questionario->id }}</th>
                          <td>{{ $questionario->descricao }}</td>
                          <td>{{ $questionario->vigencia }}</td>
                          <td>{{ $questionario->qtd_questoes }}
                          </td>
                          <td>{{ $questionario->acertos }}</td>
                          <td>
                            <div class="progress">
                                <?php $porcentagem =100 / $questionario->qtd_questoes * $questionario->acertos; ?>
                                <div class="progress-bar progress-bar-success" data-transitiongoal="{{ $porcentagem }}" aria-valuenow="{{ $porcentagem }}" style="width: 0%;"></div>
                            </div>
                          </td>
                          <td>
                              @if($questionario->acertos == 0)
                              <a href="{{ url('aluno/questionario/'.$questionario->id.'/responder') }}">Responder</a>
                              @else
                              Respondido
                              @endif
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                      
                    <div class="box-tools pull-right">
                        {{ $questionarios->appends(Request::except('page'))->render() }}
                    </div>

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