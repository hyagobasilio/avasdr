@extends('layouts.gestor.template')
{{-- Content --}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            
            <div class="pull-right">
                <a href="{{{ url('gestor/materias/create') }}}"
                   class="btn btn-success"><span
                            class="glyphicon glyphicon-plus-sign"></span> Nova Matéria</a>          
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
                @foreach($materias as $materia)
                <tr>
                    <td>{{$materia->nome}}</td>
                    <td><a href="{{ url('gestor/materias/'.$materia->id.'/edit') }}">Editar</a></td>
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
                "ajax": "{{ url('gestor/materias/data/') }}",

            });
        });
  

        
    </script>
@endsection
