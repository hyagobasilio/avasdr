@extends('layouts.gestor.template')
{{-- Content --}}
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="pull-right">
                <a href="{{{ url('gestor/materias/create') }}}"
                   class="btn btn-success iframe"><span
                            class="glyphicon glyphicon-plus-sign"></span> Nova Matéria</a>
            </div>
        </div>
    </div>
<br>
<div class="row">
    <div class="col_md_12">

        <table id="table-data" class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
@endsection

{{-- Scripts --}}
@section('scripts')
    @parent
    <script type="text/javascript">





    </script>
@endsection
