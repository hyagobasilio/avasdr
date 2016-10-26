@extends('layouts.gestor.template')

{{-- Content --}}
@section('content')
        
<div class="row">
    <div class="col-md-12">
        
        <div class="pull-right">
            <a href="{{{ url('gestor/docentes/create') }}}"
               class="btn btn-sm  btn-primary iframe"><span
                        class="glyphicon glyphicon-plus-sign"></span> Novo Aluno</a>
        </div>
    </div>
</div>

<div class="title_right">
    <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search"> 
        <div class="input-group">
            <form>
                <span class="input-group-btn">
                <input class="form-control" type="text" name="name" placeholder="Pesquisa" value="{{ $nome }}">
                    <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </form>
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
                @foreach($docentes as $docente)
                <tr>
                    <td>{{$docente->name}}</td>
                    <td>{{$docente->id}}</td>
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
