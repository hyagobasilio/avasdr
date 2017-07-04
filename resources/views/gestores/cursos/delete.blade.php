@extends('layouts.modalcolorbox')
@section('content')
{!! Form::model($model, array('url' => url('gestor/cursos') . '/' . $model->id, 'method' => 'delete', 'class' => 'bf', 'files'=> true)) !!}
	<div class="form-group">
		<div class="controls">
			<div class="alert alert-danger alert-dismissible fade in" role="alert">
	      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
	      </button>
	      <strong>Atenção!</strong> Para remover este curso é necessários remover as séries cadastradas nele.
	      <ul>
	      	@foreach($model->series as $serie)
	      	<li>{{$serie->nome}}</li>
	      	@endforeach
	      </ul>
	    </div>
		<div class="danger"></div>
			<button type="submit" class="btn btn-sm btn-danger">
				<span class="glyphicon glyphicon-trash"></span> Confirmar
			</button>
		</div>
	</div>
</form>

@stop
