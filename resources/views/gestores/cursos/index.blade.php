@extends('layouts.gestor.template')
{{-- Content --}}
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="pull-right">
      <a href="{{{ url('gestor/cursos/create') }}}"
        class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Novo Curso</a>

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
        @foreach($cursos as $curso)
        <tr>
          <td>{{$curso->nome}}</td>
          <td><a href="{{ url('gestor/cursos/'.$curso->id.'/edit') }}">Editar</a></td>
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

    </script>
@endsection
