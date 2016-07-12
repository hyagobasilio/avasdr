@extends('layouts.docente.template')
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Questões <small> todas</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      <li><a href="{{ url('docente/questao/create') }}" class="collapse-link">Add <i class="fa fa-plus-square"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Questão</th>
                          <th>Capacidade</th>
                          <th>Elemento de Competência</th>
                          <th>Objetos de Conhecimento</th>
                          <th>Dificuldade</th>
                          <th>Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($questoes as $questao)
                        <tr>
                          <th scope="row">{{ $questao->id }}</th>
                          <td>{{ $questao->questao }}</td>
                          <td>{{ $questao->capacidade }}</td>
                          <td>{{ $questao->elemento_competencia }}</td>
                          <td>{{ $questao->obj_conhecimento }}</td>
                          <td>{{ $questao->dificuldade }}</td>
                          <td><button data-questao="{{$questao->id}}" class="btn btn-add-question"><i class="fa fa-plus-square"></i></button></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                      
                    <div class="box-tools pull-right">
                        {{ $questoes->appends(Request::except('page'))->render() }}
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