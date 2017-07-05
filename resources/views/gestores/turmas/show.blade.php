@extends('layouts.gestor.template')

{{-- Content --}}
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Dados da turma</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <div class="col-xs-6">
        <p class="lead">Turma: {{$turma->nome}}</p>
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr>
                <th style="width:50%">Curso:</th>
                <td>{{ $turma->serie->curso->nome }}</td>
              </tr>
              <tr>
                <th>Série:</th>
                <td>{{ $turma->serie->nome }}</td>
              </tr>
              <tr>
                <th>Matriz:</th>
                <td>{{ $turma->matriz->nome }}</td>
              </tr>
              <tr>
                <th>Turno:</th>
                <td>{{ $turma->turno->nome }}</td>
              </tr>
              <tr>
                <th>Horário:</th>
                <td>{{ $turma->hora_inicio }} {{ $turma->hora_fim }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Parte Inferior -->
      <div class="col-md-12">
        <div class="" role="tabpanel" data-example-id="togglable-tabs">
          <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active"><a href="#alunos" id="aluno-tab" role="tab" data-toggle="tab" aria-expanded="true">Alunos</a>
            </li>
            <li role="presentation" class=""><a href="#professores" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Professores</a>
            </li>
            <li role="presentation" class=""><a href="#matriz" role="tab" id="matriz-tab" data-toggle="tab" aria-expanded="false">Matriz</a>
            </li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <!-- Alunos -->
            <div role="tabpanel" class="tab-pane fade active in" id="alunos" aria-labelledby="aluno-tab">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Situação</th>
                    <th>Data Matrícula</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($turma->matriz->itens as $item)
                  <tr>
                    <td>{{$item->materia->codigo}}</td>
                    <td>{{$item->materia->nome}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- Professores -->
            <div role="tabpanel" class="tab-pane fade" id="professores" aria-labelledby="profile-tab">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Situação</th>
                    <th>Disciplinas</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($turma->matriz->itens as $item)
                  <tr>
                    <td>{{$item->materia->codigo}}</td>
                    <td>{{$item->materia->nome}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- Matriz -->
            <div role="tabpanel" class="tab-pane fade" id="matriz" aria-labelledby="matriz-tab">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Código</th>
                    <th>Nome</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($turma->matriz->itens as $item)
                  <tr>
                    <td>{{$item->materia->codigo}}</td>
                    <td>{{$item->materia->nome}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div> <!-- ./Col-12 -->
     

    </div>
  </div> <!-- ./painel -->
</div><!-- ./Col-12 -->
<div class="clearfix"></div>
@endsection

{{-- Scripts --}}
@section('scripts')
<script type="text/javascript">


</script>
@endsection
