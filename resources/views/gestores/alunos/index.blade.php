@extends('layouts.gestor.template')

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="pull-right">
                <a href="{{{ url('gestor/alunos/create') }}}"
                   class="btn btn-success"><span
                            class="glyphicon glyphicon-plus-sign"></span> Novo Aluno</a>
            </div>
        </div>
    </div>
<br>
<div class="title_right">
    <div class="col-md-3 col-sm-3 col-xs-3 form-group pull-right top_search">
    <div class="input-group">
    <form>
            <span class="input-group-btn">
            <input class="form-control" type="text" name="nome" placeholder="Pesquisa" value="{{ $nome }}">
             <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
            </span>
    </form>
    </div>
    </div>
</div>
<div class="row">
    <div class="col_md_12">
        <table id="table" class="table table-striped table-hover">
            <thead>
              <tr>
                  <th>Nome</th>
                  <th>CPF</th>
                  <th>Data Nascimento</th>
                  <th>Ações</th>
              </tr>
              </thead>
              <tbody>
                  @foreach($alunos as $aluno)
                  <tr>
                      <td>{{$aluno->name}}</td>
                      <td>{{$aluno->cpf}}</td>
                      <td>{{ $aluno->data_nascimento}}</td>
                      <td>
                        <a href="{{ url('gestor/alunos/'.$aluno->id.'/edit'
                      )}}" class=""> <span class="fa fa-edit"></span> Editar</a>
                        <a href="{{ url('gestor/alunos/'.$aluno->id
                      )}}" class="iframe"> <span class="fa fa-eye"></span> Visualizar</a>

                    </td>
                  </tr>
                  @endforeach
            </tbody>
        </table>
        <div class="box-tools pull-right">
            {{ $alunos->appends(Request::except('page'))->render() }}
        </div>
    </div>
</div>
@endsection

{{-- Scripts --}}
@section('scripts')
    @parent
    <script type="text/javascript">

        var oTable;
        $(document).ready(function () {


            });
        });



    </script>
@endsection
