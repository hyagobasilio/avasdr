@extends('layouts.docente.template')
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xl-12">
    <div class="pull-right">
      <a class="btn btn-info btn-sm" href="{{ url('docente/post/create') }}"><i class="fa fa-plus"></i> Novo</a>
    </div>
  </div>
  <form>
    <!-- Materia -->
    <div class="col-md-3 col-sm-12 col-xs-12 {{ $errors->has('materia_id') ? 'bad' : '' }}">
      <label for="materia_id">Matéria</label>
      {!! Form::select('materia_id', $dados['materias'], null, ['class' => 'form-control']) !!}
      <ul class="parsley-errors-list filled" id="parsley-id-5">
          <li class="parsley-required">{!! $errors->first('materia_id') !!}</li>
      </ul>
    </div>
    <!-- Turma -->
    <div class="col-md-3 col-sm-12 col-xs-12  {{ $errors->has('turma_id') ? 'bad' : '' }}">
      <label for="turma_id">Turma</label>
      {!! Form::select('turma_id', $dados['turmas'], null, ['class' => 'form-control']) !!}
      <ul class="parsley-errors-list filled" id="parsley-id-5">
          <li class="parsley-required">{!! $errors->first('turma_id') !!}</li>
      </ul>
    </div>
  </form>
</div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
  @foreach($posts as $post)

    <div class="x_panel">
      <div class="x_title">
        <h1>{{ $post->titulo }}</h1>
        <p>Por: {{ $post->docente->name}}<br>
          Turma: {{ $post->turma->nome }}<br>
          Matéria: {{ $post->materia->nome }}
          <span class="right"> {{ App\Helpers\Utils::data_to_br($post->created_at) }}</span>
        </p>
        <div class="clearfix"></div>
      </div>
      <div class="x_content" style="">
        <div class="clearfix"></div>
        {!! $post->texto !!}
      </div> <!-- ./x_content -->
    </div> <!-- ./x_panel -->

  @endforeach
  </div> <!-- ./col-md-6 -->
</div> <!-- ./row -->

@endsection

@section('script')
<script>
    $(document).ready(function(){
        
    });
</script>
@endsection