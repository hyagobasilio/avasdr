@extends('layouts.gestor.template')

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="pull-right">
                <a href="{{{ url('gestor/turmas/create') }}}"
                   class="btn btn-success"><span
                            class="glyphicon glyphicon-plus-sign"></span> Nova Turma</a>
            </div>
        </div>
    </div>
<br>
<div class="row">
    <div class="col_md_12">

        <table id="table" class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Curso</th>
                <th>Série</th>
                <th>Matriz</th>
                <th>Turno</th>
                <th>Hr Início</th>
                <th>Hr Fim</th>
                <th>Data Criação</th>
                <th>#</th>
            </tr>
            </thead>
            <tbody>
                @foreach($turmas as $turma)
                <tr>
                    <td>{{$turma->nome}}</td>
                    <td>{{$turma->serie->curso->nome}}</td>
                    <td>{{$turma->serie->nome}}</td>
                    <td>{{$turma->matriz->nome}}</td>
                    <td>{{$turma->turno->nome}}</td>
                    <td>{{$turma->hora_inicio}}</td>
                    <td>{{$turma->hora_fim}}</td>
                    <td>{{$turma->created_at}}</td>
                    <td>
                        <a href="/gestor/turmas/{{$turma->id}}/matricula" class=" btn btn-sm btn-info">Matricular aluno</a>
                        <a href="/gestor/turmas/{{$turma->id}}/edit"><i class="fa fa-edit"></i> Editar</a>
                        <a href="/gestor/turmas/{{$turma->id}}/delete"><i class="fa fa-trash"></i> Excluir</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

{{-- Scripts --}}
@section('scripts')
<script type="text/javascript">


</script>
@endsection
