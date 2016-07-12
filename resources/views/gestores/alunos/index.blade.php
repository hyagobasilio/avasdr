@extends('layouts.gestor.template')

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            
            <div class="pull-right">
                <a href="{{{ url('gestor/alunos/create') }}}"
                   class="btn btn-sm  btn-primary iframe"><span
                            class="glyphicon glyphicon-plus-sign"></span> Novo Aluno</a>
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
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
                @foreach($alunos as $aluno)
                <tr>
                    <td>{{$aluno->name}}</td>
                    <td> <a href="{{ url('gestor/alunos/'.$aluno->id.'/edit')}}">Editar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

{{-- Scripts --}}
@section('scripts')
    @parent
    <script type="text/javascript">
        
        var oTable;
        $(document).ready(function () {
            oTable = $('#table').DataTable({
                "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
                "sPaginationType": "full_numbers",
                "processing": true,
                "serverSide": true,
                "ajax": "{{ URL::to('admin/turmas/data/') }}",

            });
        });
  

        
    </script>
@endsection
