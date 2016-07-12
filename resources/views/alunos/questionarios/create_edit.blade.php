@extends('layouts.docente.template')
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Questões <small> todas</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" method="post"
                        action=" {{ url('docente/questionario/create') }}">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <div class="row">
                            <!-- Descrição-->
                            <div class="col-md-4 col-sm-4 col-xs-4 form-group {{ $errors->has('descricao') ? 'bad' : '' }}">
                                <label for="descricao">Descrição</label>
                                <input type="text" name="descricao" value="{{ old('descricao')}}" class="form-control">
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{!! $errors->first('descricao') !!}</li>
                                </ul>
                            </div>
                            
                            <!-- Turma -->
                            <div class="col-md-2 col-sm-2 col-xs-2 form-group {{ $errors->has('turma_id') ? 'bad' : '' }}">
                                <label for="turma_id">Turma</label>
                                {!! Form::select('turma_id', $turmas, null, ['class' => 'form-control']) !!}
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{!! $errors->first('turma_id') !!}</li>
                                </ul>
                            </div>
                            
                            <!-- Vigência-->
                            <div class="col-md-2 col-sm-2 col-xs-2 form-group {{ $errors->has('vigencia') ? 'bad' : '' }}">
                                <label for="vigencia">Vigência</label>
                                <input type="text" name="vigencia" value="{{ old('vigencia')}}"  class="form-control data">
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{!! $errors->first('vigencia') !!}</li>
                                </ul>
                            </div>
                            
                            <!-- Vigência-->
                            <div class="col-md-12 col-sm-12 col-xs-12 ">
                                <button type="submit" class="btn btn-success">Cadastrar</button>
                            </div>
                        </div>
                    </form>
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
                        @foreach($questoes as $temp)
                        <tr>
                          <th scope="row">{{ $temp->questao->id }}</th>
                          <td>{{ $temp->questao->questao }}</td>
                          <td>{{ $temp->questao->capacidade }}</td>
                          <td>{{ $temp->questao->elemento_competencia }}</td>
                          <td>{{ $temp->questao->obj_conhecimento }}</td>
                          <td>{{ $temp->questao->dificuldade }}</td>
                          <td><a href="{{ url('docente/questaotemp/'.$temp->id.'/delete')}}" class="btn"><i class="fa fa-trash"></i></a></td>
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